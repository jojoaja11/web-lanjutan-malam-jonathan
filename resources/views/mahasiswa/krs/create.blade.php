@extends('layouts.app')

@section('content')
<h1>Daftar KRS Baru</h1>

<form method="POST" action="{{ route('mahasiswa.krs.store') }}">
  @csrf

  <div class="row mb-3">
    <div class="col-md-6">
      <label class="form-label">Tahun Ajaran</label>
      <input type="text" name="tahun_ajaran" class="form-control" value="{{ old('tahun_ajaran') }}">
    </div>
    <div class="col-md-6">
      <label class="form-label">Semester</label>
      <input type="text" name="semester" class="form-control" value="{{ old('semester') }}">
    </div>
  </div>

  <h5>Pilih Kelas</h5>
  <div class="mb-3">
    @foreach($kelas as $k)
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="kelas_ids[]" value="{{ $k->id }}" id="kelas_{{ $k->id }}">
        <label class="form-check-label" for="kelas_{{ $k->id }}">
          {{ optional($k->matakuliah)->nama_mata_kuliah ?? 'MataKuliah' }} - {{ optional($k->dosen)->name ?? 'Dosen' }} ({{ $k->hari }} {{ $k->jam }})
        </label>
      </div>
    @endforeach
  </div>

  <button class="btn btn-primary">Daftar</button>
</form>
@endsection
