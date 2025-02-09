<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bantuans = Bantuan::orderBy('id', 'desc')->paginate(5);
        return view('bantuan.index', compact('bantuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisBantuan = Bantuan::jenisBantuan();
        return view('bantuan.create', compact('jenisBantuan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_bantuan' => 'required',
            'jenis_bantuan' => 'required',
            'keterangan' => 'required',
        ]);

        Bantuan::create($request->all());
        return redirect()->route('bantuan.index')->with('success', 'Bantuan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bantuan $bantuan)
    {
        return view('bantuan.show', compact('bantuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bantuan $bantuan)
    {
        $jenisBantuan = Bantuan::jenisBantuan();
        return view('bantuan.edit', compact('bantuan', 'jenisBantuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bantuan $bantuan)
    {
        $request->validate([
            'nama_bantuan' => 'required',
            'jenis_bantuan' => 'required',
            'keterangan' => 'required',
        ]);

        $bantuan->update($request->all());
        return redirect()->route('bantuan.index')->with('success', 'Bantuan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bantuan $bantuan)
    {
        $bantuan->delete();
        return redirect()->route('bantuan.index')->with('success', 'Bantuan berhasil dihapus.');
    }

    /**
     * Export PDF
     */
    public function exportPdf()
    {
        $bantuans = Bantuan::all();
        $pdf = Pdf::loadView('bantuan.pdf', compact('bantuans'));
        return $pdf->stream('bantuan.pdf');
    }
    
}
