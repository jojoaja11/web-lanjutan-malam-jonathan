<!doctype html>
<html lang="en" data-bs-theme="light">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Website Kampus ITBSS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: var(--bs-body-bg);
            color: var(--bs-body-color);
            transition: .3s;
        }

        .kampus-img{
            width:100%;
            max-height:500px;
            object-fit:contain;
            border-radius:10px;
            display:block;
            margin:auto;
        }

        footer{
            background:#212529;
            color:white;
            margin-top:60px;
            padding:40px 0;
        }

        .footer-text{
            color:#d6d6d6;
        }

        .welcome-card{
            background:linear-gradient(90deg,#0d6efd,#0b5ed7);
            color:white;
            border-radius:12px;
        }

        .welcome-card h2{
            font-weight:bold;
        }

        .welcome-card p{
            font-size:18px;
        }

        .navbar{
            padding:15px 0;
        }

        .dropdown-toggle{
            border-radius:30px;
            font-weight:600;
            padding:8px 18px;
        }

        .dropdown-menu{
            border:none;
            border-radius:12px;
            box-shadow:0 5px 15px rgba(0,0,0,.15);
        }

        #themeToggle{
            width:45px;
            height:45px;
            border-radius:50%;
            font-size:20px;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg bg-body shadow-sm">

    <div class="container">

        <a class="navbar-brand"
           href="{{ route('dashboard') }}">

            <img src="{{ asset('images/ITB-SS.jpg') }}"
                 width="70">

        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
             id="navbarNav">

            <!-- MENU KIRI -->

            <ul class="navbar-nav me-auto">

                <li class="nav-item">

                    <a class="nav-link active"
                       href="{{ route('dashboard') }}">

                        Home

                    </a>

                </li>

                @auth

                    @if(auth()->user()->role != 'guest')

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle"
                               href="#"
                               role="button"
                               data-bs-toggle="dropdown">

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

                    @endif

                    @if(auth()->user()->role == 'mahasiswa')

                        <li class="nav-item">

                            <a class="nav-link"
                               href="{{ action([App\Http\Controllers\KelasController::class,'index']) }}">
                                Kelas
                            </a>

                        </li>

                    @endif

                @endauth

            </ul>

            <!-- MENU KANAN -->

            <button class="btn btn-outline-secondary me-3"
                    id="themeToggle"
                    title="Dark / Light Mode">
                🌙
            </button>

            @auth

                <div class="dropdown">

                    <button class="btn btn-outline-primary dropdown-toggle"
                            type="button"
                            data-bs-toggle="dropdown">

                        {{ auth()->user()->name }}

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>

                            <a class="dropdown-item"
                               href="{{ route('dashboard') }}">

                                Dashboard

                            </a>

                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>

                            <form action="{{ route('logout') }}"
                                  method="POST">

                                @csrf

                                <button type="submit"
                                        class="dropdown-item text-danger">

                                    Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </div>

            @else

                <a href="{{ route('login') }}"
                   class="btn btn-primary me-2">

                    Login

                </a>

                <a href="{{ route('register.view') }}"
                   class="btn btn-success">

                    Register

                </a>

            @endauth

        </div>

    </div>

</nav>

<!-- CONTENT -->

<!-- CONTENT -->

<div class="container mt-4">

    <div class="card welcome-card shadow border-0 mb-4">

        <div class="card-body text-center py-4">

            @auth

                <h2>Selamat Datang, {{ auth()->user()->name }}</h2>

                <p class="mb-0">
                    Login sebagai {{ ucfirst(auth()->user()->role) }}
                </p>

            @else

                <h2>Selamat Datang di Website Kampus ITBSS</h2>

                <p class="mb-0">
                    Website resmi Institut Teknologi & Bisnis Sabda Setia.
                    Silakan login untuk mengakses Sistem Informasi Akademik.
                </p>

            @endauth

        </div>

    </div>

    <div class="row">

        <div class="col-md-12 mb-4">

            <img src="{{ asset('images/Website-PMB-Jojo.png') }}"
                 class="kampus-img">

        </div>

        <div class="col-md-12">

            <img src="{{ asset('images/Gedung-ITBSS-scaled.jpg') }}"
                 class="kampus-img">

        </div>

    </div>

    <div class="card shadow border-0 mt-5">

        <div class="card-body">

            <h3>Campus Location</h3>

            <p>

                <a href="https://www.google.com/maps/place/Institut+Teknologi+%26+Bisnis+Sabda+Setia/"
                   target="_blank"
                   class="text-decoration-none">

                    Jl. Purnama II,
                    Pontianak Selatan,
                    Kota Pontianak,
                    Kalimantan Barat

                </a>

            </p>

        </div>

    </div>

</div>

<footer class="bg-body-tertiary border-top">

    <div class="container text-center py-4">

        <img src="{{ asset('images/Logo-ITBSS.png') }}"
             width="220">

        <p class="footer-text mt-3 mb-0">

            Copyright © 2026
            Institut Teknologi & Bisnis Sabda Setia

        </p>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script>

const html = document.documentElement;
const btn = document.getElementById('themeToggle');

const savedTheme = localStorage.getItem('theme') || 'light';

html.setAttribute('data-bs-theme', savedTheme);

btn.innerHTML = savedTheme === 'dark' ? '☀️' : '🌙';

btn.addEventListener('click', function () {

    const current = html.getAttribute('data-bs-theme');

    const next = current === 'dark' ? 'light' : 'dark';

    html.setAttribute('data-bs-theme', next);

    localStorage.setItem('theme', next);

    btn.innerHTML = next === 'dark' ? '☀️' : '🌙';

});

</script>

</body>
</html>