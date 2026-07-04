<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#4e73df,#1cc88a);
            min-height:100vh;
        }

        .card{
            border:none;
            border-radius:18px;
            box-shadow:0 15px 35px rgba(0,0,0,.2);
        }

        .card-header{
            background:linear-gradient(90deg,#4e73df,#1cc88a);
            color:#fff;
            text-align:center;
            font-size:28px;
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

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card">

                <div class="card-header">
                    <i class="bi bi-door-open-fill"></i>
                    Form Tambah Kelas
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('kelas.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Kode Kelas</label>
                            <input type="text"
                                   name="kode_kelas"
                                   class="form-control"
                                   placeholder="Masukkan kode kelas">
                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mata Kuliah</label>

                                <select name="kode_mata_kuliah" class="form-select">
                                    <option value="">-- Pilih Mata Kuliah --</option>

                                    @foreach($mata_kuliah as $id => $nama)
                                        <option value="{{ $id }}">
                                            {{ $nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Dosen</label>

                                <select name="kode_dosen" class="form-select">
                                    <option value="">-- Pilih Dosen --</option>

                                    @foreach($dosen as $id => $nama)
                                        <option value="{{ $id }}">
                                            {{ $nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hari</label>

                                <select name="hari" class="form-select">
                                    <option value="senin">Senin</option>
                                    <option value="selasa">Selasa</option>
                                    <option value="rabu">Rabu</option>
                                    <option value="kamis">Kamis</option>
                                    <option value="jumat">Jumat</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jam</label>

                                <select name="jam" class="form-select">
                                    <option value="07:00 - 08:40">07:00 - 08:40</option>
                                    <option value="08:50 - 11:30">08:50 - 11:30</option>
                                    <option value="12:30 - 14:10">12:30 - 14:10</option>
                                    <option value="17:00 - 18:40">17:00 - 18:40</option>
                                    <option value="19:00 - 20:40">19:00 - 20:40</option>
                                </select>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tahun Ajaran</label>

                                <input type="text"
                                       name="tahun_ajaran"
                                       class="form-control"
                                       placeholder="Contoh: 2025/2026">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Ruang Kelas</label>

                                <input type="text"
                                       name="ruang_kelas"
                                       class="form-control"
                                       placeholder="Contoh: R-301">
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jumlah Maksimal Mahasiswa</label>

                                <input type="number"
                                       name="jumlah_max"
                                       class="form-control"
                                       placeholder="40">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label d-block">Semester</label>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"
                                           type="radio"
                                           name="semester"
                                           value="ganjil">

                                    <label class="form-check-label">
                                        Ganjil
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"
                                           type="radio"
                                           name="semester"
                                           value="genap">

                                    <label class="form-check-label">
                                        Genap
                                    </label>
                                </div>

                            </div>

                        </div>

                        <div class="text-center mt-4">

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i>
                                Simpan
                            </button>

                            <button type="reset" class="btn btn-outline-secondary ms-2">
                                <i class="bi bi-arrow-clockwise"></i>
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