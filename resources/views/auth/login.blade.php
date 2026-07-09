<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | DriveRent</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body{
            min-height:100vh;
            background-size:cover;
            background-position:center;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:'Segoe UI',sans-serif;
        }

        .login-card{
            width:430px;
            border:none;
            border-radius:25px;
            overflow:hidden;
            backdrop-filter:blur(10px);
            background:rgba(255,255,255,.95);
        }

        .logo{
            width:85px;
            height:85px;
            border-radius:50%;
            background:#0d6efd;
            color:white;
            display:flex;
            justify-content:center;
            align-items:center;
            margin:auto;
            font-size:38px;
        }

        .form-control{
            border-radius:12px;
            padding:12px;
        }

        .btn-login{
            border-radius:12px;
            padding:12px;
            font-weight:bold;
        }

        a{
            text-decoration:none;
        }
    </style>

</head>

<body>

<div class="card shadow-lg login-card">

    <div class="card-body p-5">

        <div class="text-center mb-4">

            <div class="logo mb-3">
                <i class="bi bi-car-front-fill"></i>
            </div>

            <h2 class="fw-bold">
                DriveRent
            </h2>

            <p class="text-muted">
                Car Rental Management System
            </p>

        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="/login" method="POST">

            @csrf

            <div class="mb-3">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Masukkan Email"
                    required>
            </div>

            <div class="mb-4">
                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan Password"
                    required>
            </div>

            <button class="btn btn-primary w-100 btn-login">
                <i class="bi bi-box-arrow-in-right me-2"></i>
                Login
            </button>

        </form>

        <hr>

        <div class="text-center">

            Belum punya akun?

            <a href="/register" class="fw-bold">

                Daftar Sekarang

            </a>

        </div>

    </div>

</div>

</body>
</html>