<?php

namespace App\Http\Controllers;

use App\Models\KRS;
use App\Models\KRSDetail;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenKRSController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:dosen']);
    }

    public function index()
    {
        $user = auth()->user();
        $dosen = $user->dosen;
        $kelasIds = $dosen ? Kelas::where('kode_dosen', $dosen->id)->pluck('id') : collect();
        $details = KRSDetail::whereIn('kelas_id', $kelasIds)->with('krs.mahasiswa','kelas.matakuliah')->paginate(20);
        return view('dosen.krs.index', compact('details'));
    }

    public function show(KRS $krs)
    {
        $krs->load('detail.kelas.matakuliah','mahasiswa');
        return view('dosen.krs.show', compact('krs'));
    }

    public function approve(Request $request, KRS $krs)
    {
        DB::transaction(function() use ($krs) {
            $krs->update(['status' => 'approved']);
            $krs->detail()->update(['status' => 'approved']);
        });
        return back()->with('success','KRS disetujui');
    }

    public function reject(Request $request, KRS $krs)
    {
        $reason = $request->input('reason');
        DB::transaction(function() use ($krs, $reason) {
            $krs->update(['status' => 'rejected']);
            $krs->detail()->update(['status' => 'rejected']);
        });
        return back()->with('success','KRS ditolak');
    }

    public function approveDetail(Request $request, KRS $krs, KRSDetail $detail)
    {
        $user = auth()->user();
        $dosen = $user->dosen;
        if ($detail->krs_id !== $krs->id) abort(400);

        $kelas = $detail->kelas;
        if ($kelas->kode_dosen != $dosen->id) abort(403);

        $detail->update(['status' => 'approved']);
        return back()->with('success','Item KRS disetujui');
    }

    public function rejectDetail(Request $request, KRS $krs, KRSDetail $detail)
    {
        $user = auth()->user();
        $dosen = $user->dosen;
        if ($detail->krs_id !== $krs->id) abort(400);

        $kelas = $detail->kelas;
        if ($kelas->kode_dosen != $dosen->id) abort(403);

        $detail->update(['status' => 'rejected']);
        return back()->with('success','Item KRS ditolak');
    }
}
