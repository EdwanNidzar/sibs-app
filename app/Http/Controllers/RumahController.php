<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Penerima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rumahs = Rumah::with('penerima')->orderBy('id', 'desc')->paginate(5);
        return view('rumah.index', compact('rumahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penerima = Penerima::all();
        return view('rumah.create', compact('penerima'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'penerima_id' => 'required|exists:penerimas,id',
            'alamat_rumah' => 'required|string|max:255',
            'kondisi_rumah' => 'required|in:Layak,Tidak layak',
            'document_pendukung' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'status_bantuan' => 'required|in:yes,no',
        ]);

        $documentPath = null;
        if ($request->hasFile('document_pendukung')) {
            $documentPath = $request->file('document_pendukung')->store('rumah/documents', 'public');
        }

        Rumah::create([
            'penerima_id' => $request->penerima_id,
            'alamat_rumah' => $request->alamat_rumah,
            'kondisi_rumah' => $request->kondisi_rumah,
            'document_pendukung' => $documentPath,
            'status_bantuan' => $request->status_bantuan,
        ]);

        return redirect()->route('rumah.index')->with('success', 'Data Rumah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rumah $rumah)
    {
        return view('rumah.show', compact('rumah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rumah $rumah)
    {
        $penerimas = Penerima::all();
        return view('rumah.edit', compact('rumah', 'penerimas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rumah $rumah)
    {
        $request->validate([
            'penerima_id' => 'required|exists:penerimas,id',
            'alamat_rumah' => 'required|string|max:255',
            'kondisi_rumah' => 'required|in:Layak,Tidak layak',
            'document_pendukung' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'status_bantuan' => 'required|in:yes,no',
        ]);

        // Jika ada file baru, hapus file lama lalu simpan yang baru
        if ($request->hasFile('document_pendukung')) {
            if ($rumah->document_pendukung) {
                Storage::disk('public')->delete($rumah->document_pendukung);
            }
            $documentPath = $request->file('document_pendukung')->store('rumah/documents', 'public');
        } else {
            $documentPath = $rumah->document_pendukung;
        }

        $rumah->update([
            'penerima_id' => $request->penerima_id,
            'alamat_rumah' => $request->alamat_rumah,
            'kondisi_rumah' => $request->kondisi_rumah,
            'document_pendukung' => $documentPath,
            'status_bantuan' => $request->status_bantuan,
        ]);

        return redirect()->route('rumah.index')->with('success', 'Data Rumah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rumah $rumah)
    {
        if ($rumah->document_pendukung) {
            Storage::disk('public')->delete($rumah->document_pendukung);
        }

        $rumah->delete();
        return redirect()->route('rumah.index')->with('success', 'Data Rumah berhasil dihapus.');
    }

    /**
     * export to pdf
     */
    public function exportPdfRumah()
    {
        $rumahs = Rumah::with('penerima')->get();
        $pdf = PDF::loadView('rumah.pdf', compact('rumahs'));
        return $pdf->stream('data-rumah.pdf');
    }
}
