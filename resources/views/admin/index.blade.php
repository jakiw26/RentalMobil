<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin Rental Mobil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f5f7fb;
        }

        .card-dashboard {
            border: none;
            border-radius: 15px;
            transition: 0.3s;
        }

        .card-dashboard:hover {
            transform: translateY(-5px);
        }

        .menu-card {
            border: none;
            border-radius: 15px;
            transition: 0.3s;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">

            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="#">
                <img src="https://cdn-icons-png.flaticon.com/512/744/744465.png" width="40">
                DriveRent 
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

                <ul class="navbar-nav mb-2 mb-lg-0 gap-3">

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/users">Users</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/customers">Customers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/vehicle">Vehicles</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/vehicle_types">Vehicle Types</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/rentals">Rentals</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/returns">Returns</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/payments">Payments</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/drivers">Drivers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/maintenance">Maintenance</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        <div class="mb-4">
            <h2 class="fw-bold">Dashboard Rental Mobil</h2>
            <p class="text-muted">
                Selamat datang di sistem manajemen rental mobil DriveRent
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card card-dashboard bg-primary text-white shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6>Total Customers</h6>
                                <h2>120</h2>
                            </div>
                            <i class="bi bi-people-fill display-5"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-dashboard bg-success text-white shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6>Total Vehicles</h6>
                                <h2>45</h2>
                            </div>
                            <i class="bi bi-car-front-fill display-5"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-dashboard bg-warning text-dark shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6>Active Rentals</h6>
                                <h2>18</h2>
                            </div>
                            <i class="bi bi-journal-check display-5"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-dashboard bg-danger text-white shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6>Pending Returns</h6>
                                <h2>7</h2>
                            </div>
                            <i class="bi bi-arrow-repeat display-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 g-4">
            <div class="col-md-4">
                <div class="card menu-card shadow-sm h-100">
                    <div class="card-body">
                        <i class="bi bi-car-front-fill display-5 text-primary"></i>
                        <h4 class="mt-3">Kelola Kendaraan</h4>
                        <p class="text-muted">
                            Tambah, edit, dan hapus data kendaraan rental.
                        </p>
                        <a href="#" class="btn btn-primary">
                            Go
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card menu-card shadow-sm h-100">
                    <div class="card-body">
                        <i class="bi bi-people-fill display-5 text-success"></i>
                        <h4 class="mt-3">Data Customers</h4>
                        <p class="text-muted">
                            Kelola data pelanggan rental mobil.
                        </p>
                        <a href="#" class="btn btn-success">
                            Go
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card menu-card shadow-sm h-100">
                    <div class="card-body">
                        <i class="bi bi-cash-stack display-5 text-warning"></i>
                        <h4 class="mt-3">Transaksi Rental</h4>
                        <p class="text-muted">
                            Lihat data transaksi penyewaan mobil.
                        </p>
                        <a href="#" class="btn btn-warning">
                            Go
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
