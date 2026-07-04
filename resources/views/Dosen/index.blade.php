<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body{
            background:#f4f7fc;
        }

        .navbar{
            box-shadow:0 5px 15px rgba(0,0,0,.1);
        }

        .page-title{
            font-weight:bold;
            color:#0d6efd;
        }

        .card{
            border:none;
            border-radius:18px;
            box-shadow:0 10px 30px rgba(0,0,0,.08);
        }

        .table thead{
            background:#0d6efd;
            color:white;
        }

        .table th,
        .table td{
            vertical-align:middle;
        }

        .btn-action{
            width:80px;
        }

        .logo{
            border-radius:50%;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white">

    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <img src="{{ asset('images/ITB-SS.jpg') }}"
                 width="45"
                 class="logo me-2">

            Sistem Akademik
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
             id="navbarNav">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ url('/') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       data-bs-toggle="dropdown">

                        Master Data
                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item"
                               href="{{ action([App\Http\Controllers\MahasiswaController::class,'index']) }}">
                                Mahasiswa
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ action([App\Http\Controllers\DosenController::class,'index']) }}">
                                Dosen
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ action([App\Http\Controllers\JurusanController::class,'index']) }}">
                                Jurusan
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ action([App\Http\Controllers\MatakuliahController::class,'index']) }}">
                                Mata Kuliah
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ action([App\Http\Controllers\KelasController::class,'index']) }}">
                                Kelas
                            </a>
                        </li>

                    </ul>

                </li>

            </ul>

            <form class="d-flex">
                <input class="form-control me-2"
                       type="search"
                       placeholder="Cari...">

                <button class="btn btn-outline-primary">
                    <i class="bi bi-search"></i>
                </button>
            </form>

        </div>

    </div>

</nav>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="page-title">
            <i class="bi bi-person-badge-fill"></i>
            Data Dosen
        </h2>

        <a href="{{ action([App\Http\Controllers\DosenController::class,'create']) }}"
           class="btn btn-success">

            <i class="bi bi-plus-circle"></i>
            Tambah Dosen

        </a>

    </div>

    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover table-bordered align-middle">

                    <thead class="text-center">

                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>NIP</th>
                        <th>NIDN</th>
                        <th>Pendidikan</th>
                        <th>Jurusan</th>
                        <th>Tempat / Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Dibuat</th>
                        <th width="170">Aksi</th>
                    </tr>

                    </thead>

                    <tbody>

                    @foreach($dosen as $d)

                    <tr>

                        <td class="text-center">{{ $d->id }}</td>

                        <td>{{ $d->fullname }}</td>

                        <td>{{ $d->NIP }}</td>

                        <td>{{ $d->NIDN }}</td>

                        <td>{{ $d->pendidikan_terakhir }}</td>

                        <td class="text-center">{{ $d->jurusan_id }}</td>

                        <td>
                            {{ $d->tempat_lahir }}<br>
                            <small class="text-muted">
                                {{ $d->tanggal_lahir }}
                            </small>
                        </td>

                        <td>{{ $d->alamat }}</td>

                        <td>{{ $d->created_at }}</td>

                        <td>

                            <div class="d-flex gap-2">

                                <a href="{{ action([App\Http\Controllers\DosenController::class,'edit'],[$d->id]) }}"
                                   class="btn btn-warning btn-sm btn-action">

                                    <i class="bi bi-pencil-square"></i>

                                    Edit

                                </a>

                                <form action="{{ action([App\Http\Controllers\DosenController::class,'destroy'],[$d->id]) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm btn-action"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">

                                        <i class="bi bi-trash"></i>

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>