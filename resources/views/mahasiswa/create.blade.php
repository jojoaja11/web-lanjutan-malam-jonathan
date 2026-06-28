<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .card{
            border:0;
            border-radius:0;
            min-height:100vh;
        }

        .card-header{
            background:#0d6efd;
            color:white;
            padding:20px;
        }

        .form-control,
        .btn{
            border-radius:8px;
        }
    </style>
</head>

<body>

<div class="container-fluid p-0">

    <div class="card shadow">

        <div class="card-header">
            <h2 class="mb-0">Tambah Data Mahasiswa</h2>
        </div>

        <div class="card-body p-5">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ action([App\Http\Controllers\MahasiswaController::class,'store']) }}" method="POST">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text"
                               name="fullname"
                               class="form-control"
                               value="{{ old('fullname') }}">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text"
                               name="nim"
                               class="form-control"
                               value="{{ old('nim') }}">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">NISN</label>
                        <input type="text"
                               name="nisn"
                               class="form-control"
                               value="{{ old('nisn') }}">
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text"
                               name="tempat_lahir"
                               class="form-control"
                               value="{{ old('tempat_lahir') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date"
                               name="tanggal_lahir"
                               class="form-control"
                               value="{{ old('tanggal_lahir') }}">
                    </div>

                </div>

                <div class="mb-4">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control"
                              rows="5"
                              name="alamat">{{ old('alamat') }}</textarea>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ action([App\Http\Controllers\MahasiswaController::class,'index']) }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="reset" class="btn btn-warning">
                        Reset
                    </button>

                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>