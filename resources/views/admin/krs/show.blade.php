@extends('layouts.app')

@section('content')
<h1>Detail KRS (Admin) #{{ $krs->id }}</h1>
<p>Mahasiswa: {{ optional($krs->mahasiswa)->fullname ?? '-' }}</p>
<p>Tahun Ajaran: {{ $krs->tahun_ajaran }} | Semester: {{ $krs->semester }} | Status: {{ $krs->status }}</p>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Mata Kuliah</th>
      <th>Dosen</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($krs->detail as $detail)
      <tr>
        <td>{{ optional($detail->kelas->matakuliah)->nama_mata_kuliah ?? '-' }}</td>
        <td>{{ optional($detail->kelas->dosen)->name ?? '-' }}</td>
        <td>{{ $detail->status }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
