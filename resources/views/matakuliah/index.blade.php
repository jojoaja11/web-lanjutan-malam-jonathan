<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah</title>

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

        .logo{
            border-radius:50%;
        }

        .page-title{
            color:#0d6efd;
            font-weight:bold;
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

        .badge-sks{
            background:#198754;
            color:white;
            padding:6px 12px;
            border-radius:20px;
        }

        .badge-kode{
            background:#0d6efd;
            color:white;
            padding:6px 12px;
            border-radius:20px;
        }

        .btn-action{
            width:80px;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white">

    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <img src="{{ asset('images/ITB-SS.jpg') }}"
                 width="45"
                 class="logo me-2">

            Sistem Akademik
        </a>

        <button class="navbar-toggler"
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
                       placeholder="Cari mata kuliah...">

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
            <i class="bi bi-journal-bookmark-fill"></i>
            Data Mata Kuliah
        </h2>

        <a href="{{ action([App\Http\Controllers\MatakuliahController::class,'create']) }}"
           class="btn btn-success">

            <i class="bi bi-plus-circle"></i>
            Tambah Mata Kuliah

        </a>

    </div>

    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover table-bordered align-middle">

                    <thead class="text-center">

                    <tr>
                        <th>No</th>
                        <th>Jurusan ID</th>
                        <th>Kode MK</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Dosen ID</th>
                        <th>Tanggal Dibuat</th>
                        <th width="180">Aksi</th>
                    </tr>

                    </thead>

                    <tbody>

                    @foreach($mata_kuliah as $k)

                    <tr>

                        <td class="text-center">
                            {{ $k->id }}
                        </td>

                        <td class="text-center">
                            {{ $k->jurusan_id }}
                        </td>

                        <td class="text-center">
                            <span class="badge-kode">
                                {{ $k->kode_mk }}
                            </span>
                        </td>

                        <td>
                            {{ $k->nama_mk }}
                        </td>

                        <td class="text-center">
                            <span class="badge-sks">
                                {{ $k->sks }} SKS
                            </span>
                        </td>

                        <td class="text-center">
                            {{ $k->dosen_id }}
                        </td>

                        <td>
                            {{ $k->created_at }}
                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <a href="{{ action([App\Http\Controllers\MatakuliahController::class,'edit'],[$k->id]) }}"
                                   class="btn btn-warning btn-sm btn-action">

                                    <i class="bi bi-pencil-square"></i>
                                    Edit

                                </a>

                                <form action="{{ action([App\Http\Controllers\MatakuliahController::class,'destroy'],[$k->id]) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm btn-action"
                                            onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">

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