<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Jurusan</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#0d6efd,#20c997);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .card{
            width:100%;
            max-width:500px;
            border:none;
            border-radius:18px;
            box-shadow:0 15px 30px rgba(0,0,0,.2);
        }

        .card-header{
            background:linear-gradient(90deg,#0d6efd,#20c997);
            color:white;
            text-align:center;
            font-size:24px;
            font-weight:bold;
            padding:20px;
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

<div class="card">

    <div class="card-header">
        <i class="bi bi-building"></i>
        Form Tambah Data Jurusan
    </div>

    <div class="card-body p-4">

        <form action="{{ action([App\Http\Controllers\JurusanController::class,'store']) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Jurusan</label>
                <input
                    type="text"
                    class="form-control"
                    name="nama_jurusan"
                    placeholder="Masukkan nama jurusan">
            </div>

            <div class="mb-4">
                <label class="form-label">Kode Jurusan</label>
                <input
                    type="text"
                    class="form-control"
                    name="kode_jurusan"
                    placeholder="Masukkan kode jurusan">
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

</body>
</html>