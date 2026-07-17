@extends('layouts.app')

@section('content')
<h1>Semua KRS (Admin)</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Mahasiswa</th>
      <th>Tahun Ajaran</th>
      <th>Semester</th>
      <th>Status</th>
      <th>Total SKS</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($krs as $k)
    <tr>
      <td>{{ $k->id }}</td>
      <td>{{ optional($k->mahasiswa)->fullname ?? '-' }}</td>
      <td>{{ $k->tahun_ajaran }}</td>
      <td>{{ $k->semester }}</td>
      <td>{{ $k->status }}</td>
      <td>{{ $k->total_sks }}</td>
      <td><a href="{{ route('admin.krs.show', $k->id) }}" class="btn btn-sm btn-info">Detail</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $krs->links() }}
@endsection
