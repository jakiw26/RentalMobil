<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>

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
                        <a class="nav-link" href="/admin">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                    </li>

                    <!-- User -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-people-fill me-1"></i> User
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="/admin/users">
                                    <i class="bi bi-person-badge me-2"></i> Users
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/admin/customers">
                                    <i class="bi bi-person-fill me-2"></i> Customers
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Vehicle -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="vehicleDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-car-front-fill me-1"></i> Vehicle
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="vehicleDropdown">
                            <li>
                                <a class="dropdown-item" href="/admin/vehicle_types">
                                    <i class="bi bi-tags-fill me-2"></i> Vehicle Types
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/admin/vehicle">
                                    <i class="bi bi-car-front me-2"></i> Vehicles
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/admin/maintenance">
                                    <i class="bi bi-tools me-1"></i> Maintenance
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/drivers">
                            <i class="bi bi-person-vcard-fill me-1"></i> Drivers
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
                                <a class="dropdown-item" href="/admin/rentals">
                                    <i class="bi bi-journal-check me-2"></i> Rentals
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/admin/returns">
                                    <i class="bi bi-arrow-return-left me-2"></i> Returns
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/payments">
                            <i class="bi bi-credit-card-fill me-1"></i> Payments
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/laporan">
                            <i class="bi bi-file-earmark-text-fill me-1"></i> Laporan
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header bg-dark text-white rounded-top-4 border-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 fw-bold"> Laporan Rental Mobil </h3>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <table class="table table-striped">
                            <tr>
                                <th>No</th>
                                <th>Customer ID</th>
                                <th>Vehicle ID</th>
                                <th>Driver ID</th>
                                <th>Rent Date</th>
                                <th>Return Date</th>
                                <th>Total Price</th>
                                <th>Late Days</th>
                                <th>Fine</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentals as $rental)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rental->customer->name }}</td>
                                        <td>
                                            {{ $rental->vehicle->brand }}
                                            {{ $rental->vehicle->model }}
                                        </td>
                                        <td>
                                            {{ $rental->driver->name ?? '-' }}
                                        </td>
                                        <td>{{ $rental->rent_date }}</td>
                                        <td>{{ $rental->return_date }}</td>
                                        <td>{{ $rental->total_price }}</td>
                                        <td>
                                            {{ $rental->return ? $rental->return->late_days . ' Hari' : '-' }}
                                        </td>

                                        <td>
                                            {{ $rental->return ? 'Rp ' . number_format($rental->return->fine, 0, ',', '.') : '-' }}
                                        </td>
                                        <td>
                                            @if ($rental->status == 'pending')
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @elseif ($rental->status == 'approved')
                                                <span class="badge bg-success">Approved</span>
                                            @elseif ($rental->status == 'rejected')
                                                <span class="badge bg-danger">Rejected</span>
                                            @elseif ($rental->status == 'finished')
                                                <span class="badge bg-primary">Finished</span>
                                            @else
                                                <span class="badge bg-secondary">{{ ucfirst($rental->status) }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
