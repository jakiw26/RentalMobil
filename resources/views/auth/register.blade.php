<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register | DriveRent</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
            overflow: hidden;
        }


        .register-card {

            width: 350px;
            border-radius: 18px;
            border: none;
            background: rgba(255, 255, 255, .95);

        }


        .logo {

            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: #198754;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 25px;
            margin: auto;

        }


        .form-control {

            border-radius: 8px;
            padding: 8px 12px;
            font-size: 14px;

        }


        .form-label {

            font-size: 14px;

        }


        .btn-register {

            border-radius: 8px;
            padding: 9px;
            font-weight: bold;
            font-size: 14px;

        }


        a {

            text-decoration: none;

        }
    </style>

</head>

<body>

    <div class="card shadow-lg register-card">
        
        <div class="card-body p-3">
            
            <div class="text-center mb-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        
        
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="logo mb-2">

                    <i class="bi bi-car-front-fill"></i>

                </div>


                <h3 class="fw-bold mb-1">
                    DriveRent
                </h3>


                <p class="text-muted mb-3">
                    Create Your Customer Account
                </p>

            </div>


            <form action="/register" method="POST">

                @csrf


                <div class="mb-2">

                    <label class="form-label mb-1">
                        Nama Lengkap
                    </label>

                    <input type="text" name="name" class="form-control" placeholder="Masukkan Nama" required>

                </div>


                <div class="mb-2">

                    <label class="form-label mb-1">
                        Email
                    </label>

                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>

                </div>


                <div class="mb-2">

                    <label class="form-label mb-1">
                        Password
                    </label>

                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password"
                        required>

                </div>


                <div class="mb-3">

                    <label class="form-label mb-1">
                        Konfirmasi Password
                    </label>

                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Ulangi Password" required>

                </div>


                <button class="btn btn-success w-100 btn-register">

                    <i class="bi bi-person-plus-fill me-2"></i>

                    Daftar Sekarang

                </button>


            </form>


            <hr class="my-3">


            <div class="text-center small">

                Sudah punya akun?

                <a href="/login" class="fw-bold">

                    Login

                </a>

            </div>


        </div>

    </div>


</body>

</html>
