@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Daftar Kelas</h1>
  <a href="{{ url('/kelas/create') }}" class="btn btn-primary">Buat Kelas</a>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Kode</th>
      <th>Mata Kuliah</th>
      <th>Dosen</th>
      <th>Hari / Jam</th>
      <th>Ruang</th>
      <th>Jumlah Max</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($kelas as $k)
    <tr>
      <td>{{ $k->kode_kelas }}</td>
      <td>{{ optional($k->matakuliah)->nama_mata_kuliah ?? '-' }}</td>
      <td>{{ optional($k->dosen)->name ?? '-' }}</td>
      <td>{{ $k->hari }} / {{ $k->jam }}</td>
      <td>{{ $k->ruang_kelas }}</td>
      <td>{{ $k->jumlah_max }}</td>
      <td>
        <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Hapus kelas ini?')">
          @csrf
          @method('DELETE')
          <button class="btn btn-sm btn-danger">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
