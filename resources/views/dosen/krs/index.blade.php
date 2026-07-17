@extends('layouts.app')

@section('content')
<h1>KRS untuk Dosen - Items Menunggu Persetujuan</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID Detail</th>
      <th>Mahasiswa</th>
      <th>Mata Kuliah</th>
      <th>Dosen</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($details as $d)
      <tr>
        <td>{{ $d->id }}</td>
        <td>{{ optional($d->krs->mahasiswa)->fullname ?? '-' }}</td>
        <td>{{ optional($d->kelas->matakuliah)->nama_mata_kuliah ?? '-' }}</td>
        <td>{{ optional($d->kelas->dosen)->name ?? '-' }}</td>
        <td>{{ $d->status }}</td>
        <td>
          <form action="{{ route('dosen.krs.detail.approve', [$d->krs->id, $d->id]) }}" method="POST" style="display:inline">@csrf
            <button class="btn btn-sm btn-success">Approve</button>
          </form>
          <form action="{{ route('dosen.krs.detail.reject', [$d->krs->id, $d->id]) }}" method="POST" style="display:inline">@csrf
            <button class="btn btn-sm btn-danger">Reject</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{{ $details->links() }}
@endsection
