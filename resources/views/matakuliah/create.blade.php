<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Dosen</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#0d6efd,#6f42c1);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .card{
            width:100%;
            max-width:700px;
            border:none;
            border-radius:18px;
            box-shadow:0 15px 30px rgba(0,0,0,.2);
        }

        .card-header{
            background:linear-gradient(90deg,#0d6efd,#6f42c1);
            color:white;
            text-align:center;
            font-size:26px;
            font-weight:bold;
            padding:18px;
            border-radius:18px 18px 0 0 !important;
        }

        .form-label{
            font-weight:600;
        }

        .btn{
            min-width:120px;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card">

                <div class="card-header">
                    <i class="bi bi-person-badge-fill"></i>
                    Form Tambah Data Dosen
                </div>

                <div class="card-body p-4">

                    <form action="{{ action([App\Http\Controllers\DosenController::class,'store']) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="fullname" placeholder="Masukkan nama lengkap">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nomor Induk Pengajar (NIP)</label>
                                <input type="text" class="form-control" name="NIP" placeholder="Masukkan NIP">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nomor Induk Dosen Nasional (NIDN)</label>
                                <input type="text" class="form-control" name="NIDN" placeholder="Masukkan NIDN">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pendidikan Terakhir</label>
                                <input type="text" class="form-control" name="pendidikan_terakhir" placeholder="Contoh: S2">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jurusan ID</label>
                                <input type="text" class="form-control" name="jurusan_id" placeholder="Masukkan ID Jurusan">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan tempat lahir">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="4" placeholder="Masukkan alamat lengkap"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan
                            </button>

                            <button type="reset" class="btn btn-outline-secondary ms-2">
                                <i class="bi bi-arrow-counterclockwise"></i> Reset
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>