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
                        <a class="nav-link" href="/customer/vehicle">
                            <i class="bi bi-car-front-fill me-1"></i> Vehicle
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

                </ul>
            </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        <div class="row g-4">
            <div class="col-md-3">
                <a href="/customer/vehicle" class="text-decoration-none">
                    <div class="card card-dashboard bg-primary text-white shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Total Vehicle</h6>
                                    <h2>{{ $totalVehicles }}</h2>
                                </div>

                                <i class="bi bi-car-front-fill display-5"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/customer/drivers" class="text-decoration-none">
                    <div class="card card-dashboard bg-success text-white shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Drivers</h6>
                                    <h2>{{ $totalDrivers }}</h2>
                                </div>

                                <i class="bi bi-person-vcard-fill display-5"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/customer/maintenance" class="text-decoration-none">
                    <div class="card card-dashboard bg-warning text-dark shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Maintenance</h6>
                                    <h2>{{ $totalMaintenance }}</h2>
                                </div>

                                <i class="bi bi-tools display-5"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/customer/payments" class="text-decoration-none">
                    <div class="card card-dashboard bg-danger text-white shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Total Belum Bayar</h6>
                                    <h2>{{ $BelumLunas }}</h2>
                                </div>

                                <i class="bi bi-credit-card-fill display-5"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="container py-5">

            <div class="row g-4 justify-content-center">

                <!-- Rental -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-4 h-100">

                        <div class="card-header bg-primary text-white text-center py-3 rounded-top-4 border-0">
                            <i class="bi bi-journal-check display-5"></i>
                        </div>

                        <div class="card-body text-center p-4">

                            <span class="badge bg-primary mb-3 px-3 py-2">
                                Rental Management
                            </span>

                            <h5 class="fw-bold">
                                Kelola Rental
                            </h5>

                            <p class="text-muted small mb-4">
                                Kelola seluruh transaksi penyewaan kendaraan mulai dari
                                pemesanan hingga selesai.
                            </p>

                            <a href="/customer/rentals" class="btn btn-primary btn-sm rounded-pill px-4">
                                <i class="bi bi-arrow-right-circle me-1"></i>
                                Kelola Rental
                            </a>

                        </div>

                    </div>
                </div>

                <!-- Return -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-4 h-100">

                        <div class="card-header bg-success text-white text-center py-3 rounded-top-4 border-0">
                            <i class="bi bi-arrow-return-left display-5"></i>
                        </div>

                        <div class="card-body text-center p-4">

                            <span class="badge bg-success mb-3 px-3 py-2">
                                Return Management
                            </span>

                            <h5 class="fw-bold">
                                Data Return
                            </h5>

                            <p class="text-muted small mb-4">
                                Kelola seluruh data pengembalian kendaraan rental yang
                                telah selesai disewa.
                            </p>

                            <a href="/customer/returns" class="btn btn-success btn-sm rounded-pill px-4">
                                <i class="bi bi-arrow-right-circle me-1"></i>
                                Lihat Return
                            </a>

                        </div>

                    </div>
                </div>

                <!-- Payment -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-4 h-100">

                        <div class="card-header bg-warning text-dark text-center py-3 rounded-top-4 border-0">
                            <i class="bi bi-credit-card-2-front-fill display-5"></i>
                        </div>

                        <div class="card-body text-center p-4">

                            <span class="badge bg-warning text-dark mb-3 px-3 py-2">
                                Payment Management
                            </span>

                            <h5 class="fw-bold">
                                Pembayaran
                            </h5>

                            <p class="text-muted small mb-4">
                                Kelola pembayaran serta lihat riwayat transaksi rental
                                kendaraan.
                            </p>

                            <a href="/customer/payments" class="btn btn-warning btn-sm rounded-pill px-4">
                                <i class="bi bi-arrow-right-circle me-1"></i>
                                Lihat Pembayaran
                            </a>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
