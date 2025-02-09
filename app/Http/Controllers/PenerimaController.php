<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penerimas = Penerima::with(['district', 'village'])->orderBy('id', 'desc')->paginate();
        return view('penerima.index', compact('penerimas'));
    }

    // Mendapatkan daftar kecamatan berdasarkan Regency ID 6310
    public function getDistricts()
    {
        $districts = District::where('regency_id', 6310)->get();
        return response()->json($districts);
    }

    // Mendapatkan daftar desa berdasarkan kecamatan yang dipilih
    public function getVillages($district_id)
    {
        $villages = Village::where('district_id', $district_id)->get();
        return response()->json($villages);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = District::where('regency_id', 6310)->get();
        return view('penerima.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:16|unique:penerimas,nik',
            'no_kk' => 'required|string|max:16',
            'nama_lengkap' => 'required|string|max:255',
            'jk' => 'required|in:Laki-laki,Perempuan',
            'district_id' => 'required|exists:districts,id',
            'village_id' => 'required|exists:villages,id',
            'alamat_penerima' => 'required|string',
            'dtks_status' => 'required|in:Terdaftar,TidakTerdaftar',
            'kategori' => 'required|in:Lansia,Penyandang Disabilitas,Yatim Piatu,Keluarga Miskin',
            'status_hidup' => 'required|in:Hidup,Meninggal',
        ]);

        Penerima::create([
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'nama_lengkap' => $request->nama_lengkap,
            'jk' => $request->jk,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'alamat_penerima' => $request->alamat_penerima,
            'dtks_status' => $request->dtks_status,
            'kategori' => $request->kategori,
            'status_hidup' => $request->status_hidup,
        ]);

        return redirect()->route('penerima.index')->with('success', 'Data Penerima berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Penerima $penerima)
    {
        return view('penerima.show', compact('penerima'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penerima $penerima)
    {
        $districts = District::where('regency_id', 6310)->get();
        $villages = Village::where('district_id', $penerima->district_id)->get();

        return view('penerima.edit', compact('penerima', 'districts', 'villages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penerima $penerima)
    {
        $request->validate([
            'nik' => 'required|digits:16',
            'no_kk' => 'required|digits:16',
            'nama_lengkap' => 'required|string|max:255',
            'jk' => 'required|in:Laki-laki,Perempuan',
            'district_id' => 'required|exists:districts,id',
            'village_id' => 'required|exists:villages,id',
            'alamat_penerima' => 'required|string',
            'dtks_status' => 'required',
            'kategori' => 'required',
            'status_hidup' => 'required|in:Hidup,Meninggal',
        ]);
    
        $penerima->update($request->all());
    
        return redirect()->route('penerima.index')->with('success', 'Data penerima berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penerima $penerima)
    {
        $penerima->delete();
        return redirect()->route('penerima.index')->with('success', 'Data penerima berhasil dihapus.');
    }

    /**
     * Export data penerima to PDF
     */
    public function exportPdfPenerima()
    {
        $penerimas = Penerima::with(['district', 'village'])->orderBy('id', 'desc')->get();
        $pdf = PDF::loadView('penerima.pdf', compact('penerimas'))->setPaper('a4', 'landscape');
        return $pdf->stream('data-penerima.pdf');
    }
}
