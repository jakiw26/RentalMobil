<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maintenance</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">

            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="/admin">
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

                    <ul class="navbar-nav ms-auto align-items-center">

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">

                                <i class="bi bi-person-circle me-1"></i>

                                {{ Auth::user()->name }}

                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">

                                <li>
                                    <span class="dropdown-item-text fw-bold">
                                        {{ Auth::user()->email }}
                                    </span>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>

                                    <form action="{{ route('logout') }}" method="POST">

                                        @csrf

                                        <button type="submit" class="dropdown-item text-danger">

                                            <i class="bi bi-box-arrow-right me-2"></i>

                                            Logout

                                        </button>

                                    </form>

                                </li>

                            </ul>

                        </li>

                    </ul>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header bg-dark text-white rounded-top-4 border-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 fw-bold">Maintenance </h3>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <table class="table table-striped">
                            <tr>
                                <th>No</th>
                                <th>Vehicle</th>
                                <th>Deskripsi</th>
                                <th>Cost</th>
                                <th>Service Date</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($maintenances as $maintenance)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            {{ $maintenance->vehicle->brand ?? '-' }}
                                            {{ $maintenance->vehicle->model ?? '' }}
                                        </td>

                                        <td>{{ $maintenance->description }}</td>

                                        <td>{{ $maintenance->cost }}</td>

                                        <td>{{ $maintenance->service_date }}</td>

                                        <td>{{ $maintenance->status }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09cYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

</body>

</html>
