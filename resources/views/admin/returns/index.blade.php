<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Returns</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
                        <a class="nav-link" href="/admin">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/users">Users</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/customers">Customers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/vehicle_types">Vehicle Types</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/vehicle">Vehicles</a>
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

    <div class="container py-5">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header bg-dark text-white rounded-top-4 border-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 fw-bold"> Data Return </h3> <button
                        class="btn btn-light text-primary fw-semibold rounded-pill px-4" data-bs-toggle="modal"
                        data-bs-target="#tambahBorrowingModal"> + Tambah Data </button>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <table class="table table-striped">
                            <tr>
                                <th>No</th>
                                <th>Rental Id</th>
                                <th>Return Date</th>
                                <th>Late Days</th>
                                <th>Fine</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($returns as $return)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $return->rental_id }}</td>
                                        <td>{{ $return->return_date }}</td>
                                        <td>{{ $return->late_days }}</td>
                                        <td>{{ $return->fine }}</td>

                                        <td>
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $return->id }}">
                                                Edit
                                            </button>

                                            <form action="/admin/returns/delete/{{ $return->id }}" method="POST"
                                                class="d-inline">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahBorrowingModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title fw-bold">
                        Add Returns
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body p-4">
                    <form action="/admin/returns/store" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Rental
                            </label>

                            <select name="rental_id" class="form-select" required>

                                <option value="">
                                    -- Pilih Rental --
                                </option>

                                @foreach ($rentals as $rental)
                                    <option value="{{ $rental->id }}">
                                        Rental #{{ $rental->id }} -
                                        {{ $rental->customer->name ?? 'Customer' }}
                                        |
                                        {{ $rental->vehicle->brand ?? '' }}
                                        {{ $rental->vehicle->model ?? '' }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Return Date
                            </label>
                            <input type="date" name="return_date" class="form-control" placeholder="Masukkan date"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Late Days
                            </label>
                            <input type="number" name="late_days" class="form-control" placeholder="Masukan days"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Fine
                            </label>
                            <input type="number" name="fine" class="form-control" placeholder="Masukan Role"
                                required>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Batal
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($returns as $return)
        <div class="modal fade" id="editModal{{ $return->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 shadow">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title fw-bold">
                            Edit Returns
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>

                    <div class="modal-body p-4">
                        <form action="/admin/returns/update/{{ $return->id }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Rental
                                </label>

                                <select name="rental_id" class="form-select" required>

                                    <option value="">
                                        -- Pilih Rental --
                                    </option>

                                    @foreach ($rentals as $rental)
                                        <option value="{{ $rental->id }}"
                                            {{ $return->rental_id == $rental->id ? 'selected' : '' }}>

                                            Rental #{{ $rental->id }} -
                                            {{ $rental->customer->name ?? 'Customer' }}
                                            |
                                            {{ $rental->vehicle->brand ?? '' }}
                                            {{ $rental->vehicle->model ?? '' }}

                                        </option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Return Date
                                </label>
                                <input type="date" name="return_date" class="form-control"
                                    value="{{ $return->return_date }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Late Days
                                </label>
                                <input type="number" name="late_days" class="form-control"
                                    value="{{ $return->late_days }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Fine
                                </label>
                                <input type="number" name="fine" class="form-control"
                                    value="{{ $return->fine }}" required>
                            </div>

                            <div class="text-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Batal
                                </button>
                                <button type="submit" class="btn btn-warning">
                                    Update
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09cYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

</body>

</html>
