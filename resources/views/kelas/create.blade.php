@extends('layouts.app')

@section('content')
<h1>Buat Kelas</h1>

<form method="POST" action="{{ url('/kelas') }}">
  @csrf

  <div class="mb-3">
    <label class="form-label">Kode Kelas</label>
    <input type="text" name="kode_kelas" class="form-control" value="{{ old('kode_kelas') }}">
  </div>

  <div class="mb-3">
    <label class="form-label">Mata Kuliah</label>
    <select name="kode_mata_kuliah" class="form-select">
      <option value="">-- Pilih --</option>
      @foreach($mata_kuliah as $id => $label)
        <option value="{{ $id }}" {{ old('kode_mata_kuliah') == $id ? 'selected' : '' }}>{{ $label }}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label class="form-label">Dosen</label>
    <select name="kode_dosen" class="form-select">
      <option value="">-- Pilih --</option>
      @foreach($dosen as $id => $label)
        <option value="{{ $id }}" {{ old('kode_dosen') == $id ? 'selected' : '' }}>{{ $label }}</option>
      @endforeach
    </select>
  </div>

  <div class="row">
    <div class="col-md-4 mb-3">
      <label class="form-label">Hari</label>
      <input type="text" name="hari" class="form-control" value="{{ old('hari') }}">
    </div>
    <div class="col-md-4 mb-3">
      <label class="form-label">Jam</label>
      <input type="text" name="jam" class="form-control" value="{{ old('jam') }}">
    </div>
    <div class="col-md-4 mb-3">
      <label class="form-label">Ruang</label>
      <input type="text" name="ruang_kelas" class="form-control" value="{{ old('ruang_kelas') }}">
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 mb-3">
      <label class="form-label">Tahun Ajaran</label>
      <input type="text" name="tahun_ajaran" class="form-control" value="{{ old('tahun_ajaran') }}">
    </div>
    <div class="col-md-4 mb-3">
      <label class="form-label">Jumlah Max</label>
      <input type="number" name="jumlah_max" class="form-control" value="{{ old('jumlah_max') }}">
    </div>
    <div class="col-md-4 mb-3">
      <label class="form-label">Semester</label>
      <input type="text" name="semester" class="form-control" value="{{ old('semester') }}">
    </div>
  </div>

  <button class="btn btn-primary">Simpan</button>
</form>

@endsection
