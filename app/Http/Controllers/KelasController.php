<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Matakuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();

        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data nyata dari DB untuk dropdown
        $mata_kuliah = Matakuliah::pluck('nama_mata_kuliah', 'id');
        $dosen = Dosen::pluck('name', 'id');

        return view('kelas.create', compact('mata_kuliah', 'dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kelas' => 'required|string',
            'kode_mata_kuliah' => 'required|exists:matakuliah,id',
            'kode_dosen' => 'required|exists:dosen,id',
            'hari' => 'required|string',
            'jam' => 'required|string',
            'tahun_ajaran' => 'required|string',
            'ruang_kelas' => 'required|string',
            'jumlah_max' => 'required|integer',
            'semester' => 'required|string'
        ]);

        Kelas::create($validated);

        return redirect('/kelas')
            ->with('success', 'Data kelas berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect('/kelas')
            ->with('success', 'Data kelas berhasil dihapus');
    }
}
