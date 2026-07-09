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
                        <a class="nav-link" href="/customer">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/customer/alamat">
                            <i class="bi bi-geo-alt-fill me-1"></i> Alamat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customer/vehicle">
                            <i class="bi bi-car-front-fill me-1"></i> Vehicle
                        </a>
                    </li>

                    <!-- Rentals -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="transactionDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-receipt-cutoff me-1"></i> Rentals
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="transactionDropdown">
                            <li>
                                <a class="dropdown-item" href="/customer/rentals">
                                    <i class="bi bi-journal-check me-2"></i> Rentals
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/customer/returns">
                                    <i class="bi bi-arrow-return-left me-2"></i> Returns
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/customer/payments">
                            <i class="bi bi-credit-card-fill me-1"></i> Payments
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/customer/drivers">
                            <i class="bi bi-person-vcard-fill me-1"></i> Drivers
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/customer/maintenance">
                            <i class="bi bi-tools me-1"></i> Maintenance
                        </a>
                    </li>

                </ul>
            </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        <div class="row g-4">
            <div class="col-md-3">
                <a href="/admin/customers" class="text-decoration-none">
                    <div class="card card-dashboard bg-primary text-white shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Total Customers</h6>
                                    {{-- <h2>{{ $totalCustomers }}</h2> --}}
                                </div>

                                <i class="bi bi-people-fill display-5"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/admin/vehicle" class="text-decoration-none">
                    <div class="card card-dashboard bg-success text-white shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Total Vehicles</h6>
                                    {{-- <h2>{{ $totalVehicles }}</h2> --}}
                                </div>

                                <i class="bi bi-car-front-fill display-5"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/admin/rentals" class="text-decoration-none">
                    <div class="card card-dashboard bg-warning text-dark shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Active Rentals</h6>
                                    {{-- <h2>{{ $activeRentals }}</h2> --}}
                                </div>

                                <i class="bi bi-journal-check display-5"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/admin/returns" class="text-decoration-none">
                    <div class="card card-dashboard bg-danger text-white shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Pending Returns</h6>
                                    {{-- <h2>{{ $pendingReturns }}</h2> --}}
                                </div>

                                <i class="bi bi-arrow-repeat display-5"></i>
                            </div>
                        </div>
                    </div>
                </a>
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
                        <a href="/admin/vehicle" class="btn btn-primary">
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
                        <a href="/admin/customers" class="btn btn-success">
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
                        <a href="/admin/payments" class="btn btn-warning">
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
