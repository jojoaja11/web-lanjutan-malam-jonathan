<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body{
            background:#eef3f9;
        }

        .navbar{
            box-shadow:0 3px 10px rgba(0,0,0,.1);
        }

        .hero{
            background:linear-gradient(135deg,#0d6efd,#4f8dfd);
            color:white;
            border-radius:20px;
            padding:35px;
            margin-top:30px;
            margin-bottom:30px;
        }

        .hero h2{
            font-weight:bold;
        }

        .card{
            border:none;
            border-radius:18px;
        }

        .table thead{
            background:#0d6efd;
            color:white;
        }

        .table tbody tr:hover{
            background:#f5f9ff;
        }

        .badge-nim{
            background:#0d6efd;
            color:white;
            padding:8px 12px;
            border-radius:20px;
            font-size:13px;
        }

        .btn{
            border-radius:8px;
        }

        .table td{
            vertical-align:middle;
        }

        .logo{
            border-radius:50%;
        }
    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg bg-white">

    <div class="container">

        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/ITB-SS.jpg') }}"
                 width="55"
                 class="logo">
        </a>

        <button class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       data-bs-toggle="dropdown"
                       href="#">

                        Menu

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
                       placeholder="Cari mahasiswa...">

                <button class="btn btn-primary">
                    <i class="bi bi-search"></i>
                </button>

            </form>

        </div>

    </div>

</nav>

<div class="container">

    <div class="hero d-flex justify-content-between align-items-center">

        <div>

            <h2>
                <i class="bi bi-mortarboard-fill"></i>
                Data Mahasiswa
            </h2>

            <p class="mb-0">
                Sistem Informasi Akademik
            </p>

        </div>

        <a href="{{ action([App\Http\Controllers\MahasiswaController::class,'create']) }}"
           class="btn btn-light btn-lg">

            <i class="bi bi-plus-circle"></i>

            Tambah Mahasiswa

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif

    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>NIM</th>
                            <th>NIDN</th>
                            <th>Tempat / Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($mahasiswa as $m)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>{{ $m->fullname }}</strong>
                            </td>

                            <td>
                                <span class="badge-nim">
                                    {{ $m->NIM }}
                                </span>
                            </td>

                            <td>{{ $m->NIDN }}</td>

                            <td>
                                {{ $m->tempat_lahir }}

                                <br>

                                <small class="text-muted">
                                    {{ $m->tanggal_lahir }}
                                </small>

                            </td>

                            <td>{{ $m->alamat }}</td>

                            <td>
                                {{ $m->created_at->format('d M Y') }}
                            </td>

                            <td>

                                <a href="{{ action([App\Http\Controllers\MahasiswaController::class,'edit'],[$m->id]) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                <form action="{{ action([App\Http\Controllers\MahasiswaController::class,'destroy'],[$m->id]) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8" class="text-center">

                                <i class="bi bi-database-x fs-2"></i>

                                <br>

                                Belum ada data mahasiswa.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>