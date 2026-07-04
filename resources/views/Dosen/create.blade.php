<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Dosen</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#4e73df,#36b9cc);
            min-height:100vh;
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 10px 25px rgba(0,0,0,.2);
        }

        .card-header{
            background:#4e73df;
            color:white;
            font-size:24px;
            font-weight:bold;
            text-align:center;
            border-radius:15px 15px 0 0 !important;
        }

        .form-label{
            font-weight:600;
        }

        .btn{
            width:120px;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    Form Tambah Data Dosen
                </div>

                <div class="card-body">

                    <form action="{{ action([App\Http\Controllers\DosenController::class,'store']) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="fullname">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Induk Pengajar (NIP)</label>
                            <input type="text" class="form-control" name="NIP">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Induk Dosen Nasional (NIDN)</label>
                            <input type="text" class="form-control" name="NIDN">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pendidikan Terakhir</label>
                            <input type="text" class="form-control" name="pendidikan_terakhir">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jurusan ID</label>
                            <input type="text" class="form-control" name="jurusan_id">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" rows="4" name="alamat"></textarea>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>

                            <button type="reset" class="btn btn-outline-secondary ms-2">
                                Reset
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