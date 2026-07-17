@extends('layouts.app')

@section('content')
<h1>Detail KRS #{{ $krs->id }}</h1>
<p>Mahasiswa: {{ optional($krs->mahasiswa)->fullname ?? '-' }}</p>
<p>Status: {{ $krs->status }}</p>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Mata Kuliah</th>
      <th>Dosen</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($krs->detail as $detail)
      <tr>
        <td>{{ optional($detail->kelas->matakuliah)->nama_mata_kuliah ?? '-' }}</td>
        <td>{{ optional($detail->kelas->dosen)->name ?? '-' }}</td>
        <td>{{ $detail->status }}</td>
        <td>
          <form action="{{ route('dosen.krs.detail.approve', [$krs->id, $detail->id]) }}" method="POST" style="display:inline">@csrf
            <button class="btn btn-sm btn-success">Approve</button>
          </form>
          <form action="{{ route('dosen.krs.detail.reject', [$krs->id, $detail->id]) }}" method="POST" style="display:inline">@csrf
            <button class="btn btn-sm btn-danger">Reject</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
