<?php

namespace App\Http\Controllers;

use App\Models\PenerimaBantuan;
use App\Models\Penerima;
use App\Models\Bantuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class PenerimaBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penerima_bantuans = PenerimaBantuan::with(['bantuan', 'penerima'])->orderBy('id', 'desc')->paginate();
        return view('penerima-bantuan.index', compact('penerima_bantuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penerima = Penerima::all();
        $bantuan = Bantuan::all();
        return view('penerima-bantuan.create', compact('penerima', 'bantuan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bantuan_id' => 'required|exists:bantuans,id',
            'penerima_id' => 'required|exists:penerimas,id',            
            'tanggal_penerimaan' => 'required|date',
            'dokumentasi' => 'nullable|array|max:5',
            'dokumentasi.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $files = [];

        if ($request->hasFile('dokumentasi')) {
            foreach ($request->file('dokumentasi') as $file) {
                $files[] = $file->store('penerima-bantuan/dokumentasi', 'public');
            }
        }

        PenerimaBantuan::create([
            'bantuan_id' => $request->bantuan_id,
            'penerima_id' => $request->penerima_id,            
            'tanggal_penerimaan' => $request->tanggal_penerimaan,
            'dokumentasi' => !empty($files) ? json_encode($files) : null, 
        ]);

        return redirect()->route('penerima-bantuan.index')
            ->with('success', 'Data Penerima Bantuan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenerimaBantuan $penerima_bantuan)
    {
        return view('penerima-bantuan.show', compact('penerima_bantuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenerimaBantuan $penerima_bantuan)
    {
        $penerima = Penerima::all();
        $bantuan = Bantuan::all();
        return view('penerima-bantuan.edit', compact('penerima_bantuan', 'penerima', 'bantuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenerimaBantuan $penerima_bantuan)
    {
        $request->validate([
            'bantuan_id' => 'required|exists:bantuans,id',
            'penerima_id' => 'required|exists:penerimas,id',
            'tanggal_penerimaan' => 'required|date',
            'dokumentasi' => 'nullable|array|max:5',
            'dokumentasi.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $files = [];

        if ($request->hasFile('dokumentasi')) {
            // Delete old files
            if ($penerima_bantuan->dokumentasi) {
                foreach (json_decode($penerima_bantuan->dokumentasi) as $file) {
                    Storage::disk('public')->delete($file);
                }
            }

            // Store new files
            foreach ($request->file('dokumentasi') as $file) {
                $files[] = $file->store('penerima-bantuan/dokumentasi', 'public');
            }
        }

        $penerima_bantuan->update([
            'bantuan_id' => $request->bantuan_id,
            'penerima_id' => $request->penerima_id,
            'tanggal_penerimaan' => $request->tanggal_penerimaan,
            'dokumentasi' => !empty($files) ? json_encode($files) : $penerima_bantuan->dokumentasi,
        ]);

        return redirect()->route('penerima-bantuan.index')
            ->with('success', 'Data Penerima Bantuan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenerimaBantuan $penerima_bantuan)
    {
        if ($penerima_bantuan->dokumentasi) {
            foreach (json_decode($penerima_bantuan->dokumentasi) as $file) {
                Storage::disk('public')->delete($file);
            }
        }

        $penerima_bantuan->delete();

        return redirect()->route('penerima-bantuan.index')
            ->with('success', 'Data Penerima Bantuan berhasil dihapus.');
    }

    /**
     * report pdf the specified resource from storage.
     */
    public function exportPdfPenerimaBantuan()
    {
        $penerima_bantuans = PenerimaBantuan::with(['bantuan', 'penerima'])->orderBy('id', 'desc')->get();
        $pdf = PDF::loadView('penerima-bantuan.pdf', compact('penerima_bantuans'));
        return $pdf->stream('penerima-bantuan.pdf');
    }

}
