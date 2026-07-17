<?php

namespace App\Http\Controllers;

use App\Models\KRS;
use App\Models\KRSDetail;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KRSController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:mahasiswa']);
    }

    public function index()
    {
        $user = auth()->user();
        $mahasiswa = $user->mahasiswa;
        $krsList = KRS::where('kode_mahasiswa', $mahasiswa->id)->paginate(10);
        return view('mahasiswa.krs.index', compact('krsList'));
    }

    public function create()
    {
        $kelas = Kelas::with('matakuliah','dosen')->get();
        return view('mahasiswa.krs.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $mahasiswa = $user->mahasiswa;

        $validated = $request->validate([
            'tahun_ajaran' => 'required|string',
            'semester' => 'required',
            'kelas_ids' => 'required|array',
            'kelas_ids.*' => 'exists:kelas,id',
        ]);

        DB::transaction(function() use ($validated, $mahasiswa) {
            $krs = KRS::create([
                'kode_mahasiswa' => $mahasiswa->id,
                'tahun_ajaran' => $validated['tahun_ajaran'],
                'semester' => $validated['semester'],
                'status' => 'submitted',
                'total_sks' => 0
            ]);

            $total = 0;
            foreach ($validated['kelas_ids'] as $kelasId) {
                $kelas = Kelas::find($kelasId);
                $total += $kelas->matakuliah->sks ?? 0;
                KRSDetail::create([
                    'krs_id' => $krs->id,
                    'kelas_id' => $kelasId,
                    'status' => 'pending'
                ]);
            }

            $krs->update(['total_sks' => $total]);
        });

        return redirect()->route('mahasiswa.krs.index')->with('success','KRS berhasil didaftarkan');
    }

    public function show(KRS $krs)
    {
        $user = auth()->user();
        if ($krs->kode_mahasiswa != $user->mahasiswa->id) abort(403);
        $krs->load('detail.kelas.matakuliah','detail.kelas.dosen');
        return view('mahasiswa.krs.show', compact('krs'));
    }

    // Admin views
    public function adminIndex()
    {
        $krs = KRS::with('mahasiswa')->paginate(20);
        return view('admin.krs.index', compact('krs'));
    }

    public function adminShow(KRS $krs)
    {
        $krs->load('detail.kelas.matakuliah','mahasiswa');
        return view('admin.krs.show', compact('krs'));
    }
}
