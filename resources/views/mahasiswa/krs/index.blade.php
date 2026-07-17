@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Daftar KRS Saya</h1>
  <a href="{{ route('mahasiswa.krs.create') }}" class="btn btn-primary">Daftar KRS</a>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Tahun Ajaran</th>
      <th>Semester</th>
      <th>Status</th>
      <th>Total SKS</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($krsList as $krs)
    <tr>
      <td>{{ $krs->id }}</td>
      <td>{{ $krs->tahun_ajaran }}</td>
      <td>{{ $krs->semester }}</td>
      <td>{{ $krs->status }}</td>
      <td>{{ $krs->total_sks }}</td>
      <td><a href="{{ route('mahasiswa.krs.show', $krs->id) }}" class="btn btn-sm btn-info">Detail</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $krsList->links() }}
@endsection
