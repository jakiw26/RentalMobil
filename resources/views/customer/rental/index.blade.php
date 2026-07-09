<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rentals</title>

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
        </div>
    </nav>

    <div class="container py-5">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header bg-dark text-white rounded-top-4 border-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 fw-bold"> Data Rentals </h3>
                    <button class="btn btn-light text-primary fw-semibold rounded-pill px-4" data-bs-toggle="modal"
                        data-bs-target="#tambahModalRentals"> + Tambah Data </button>
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
                                <th>Status</th>
                                <th>Action</th>
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

                                        <td>
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $rental->id }}">
                                                Edit
                                            </button>

                                            <form action="/customer/rentals/delete/{{ $rental->id }}" method="POST"
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
    <div class="modal fade" id="tambahModalRentals" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title fw-bold">
                        Add Rentals
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body p-4">
                    <form action="/customer/rentals/store" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Customer
                            </label>

                            <select name="customer_id" class="form-select" required>
                                <option value="">
                                    -- Pilih Customer --
                                </option>

                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">
                                        {{ $customer->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>


                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Vehicle
                            </label>

                            <select name="vehicle_id" id="vehicle_id" class="form-select" required>

                                <option value="">
                                    -- Pilih Vehicle --
                                </option>

                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}" data-price="{{ $vehicle->price_per_day }}">

                                        {{ $vehicle->brand }}
                                        {{ $vehicle->model }}
                                        -
                                        {{ $vehicle->plate_number }}

                                    </option>
                                @endforeach

                            </select>
                        </div>


                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Driver
                            </label>

                            <select name="driver_id" class="form-select">
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}">
                                        {{ $driver->name }} - {{ $driver->phone }}
                                    </option>
                                @endforeach

                            </select>
                        </div>


                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Rent Date
                            </label>

                            <input type="date" name="rent_date" id="rent_date" class="form-control" required>
                        </div>


                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Return Date
                            </label>

                            <input type="date" name="return_date" id="return_date" class="form-control" required>
                        </div>


                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Total Price
                            </label>

                            <input type="number" name="total_price" id="total_price" class="form-control" readonly>

                        </div>


                        {{-- Status otomatis pending --}}
                        <input type="hidden" name="status" value="pending">
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

    @foreach ($rentals as $rental)
        <div class="modal fade" id="editModal{{ $rental->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 shadow">

                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title fw-bold">
                            Edit Rental
                        </h5>

                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>


                    <div class="modal-body p-4">

                        <form action="/customer/rentals/update/{{ $rental->id }}" method="POST">
                            @csrf
                            @method('PUT')


                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Customer
                                </label>

                                <select name="customer_id" class="form-select" required>

                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}"
                                            {{ $rental->customer_id == $customer->id ? 'selected' : '' }}>

                                            {{ $customer->name }}

                                        </option>
                                    @endforeach

                                </select>
                            </div>


                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Vehicle
                                </label>

                                <select name="vehicle_id" id="vehicle_id{{ $rental->id }}" class="form-select"
                                    required>


                                    @foreach ($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}"
                                            data-price="{{ $vehicle->price_per_day }}"
                                            {{ $rental->vehicle_id == $vehicle->id ? 'selected' : '' }}>

                                            {{ $vehicle->brand }}
                                            {{ $vehicle->model }}
                                            -
                                            {{ $vehicle->plate_number }}

                                        </option>
                                    @endforeach


                                </select>
                            </div>


                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Driver
                                </label>


                                <select name="driver_id" class="form-select">


                                    <option value="">
                                        -- Tanpa Driver --
                                    </option>


                                    @foreach ($drivers as $driver)
                                        <option value="{{ $driver->id }}"
                                            {{ $rental->driver_id == $driver->id ? 'selected' : '' }}>

                                            {{ $driver->name }}
                                            -
                                            {{ $driver->phone }}

                                        </option>
                                    @endforeach


                                </select>

                            </div>


                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Rent Date
                                </label>

                                <input type="date" name="rent_date" class="form-control"
                                    value="{{ $rental->rent_date }}" required>
                            </div>


                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Return Date
                                </label>

                                <input type="date" name="return_date" class="form-control"
                                    value="{{ $rental->return_date }}" required>
                            </div>


                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Total Price
                                </label>

                                <input type="number" name="total_price" class="form-control"
                                    value="{{ $rental->total_price }}" readonly>
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

    <script>
        function hitungHarga() {

            let vehicle = document.getElementById('vehicle_id');
            let harga = vehicle.options[vehicle.selectedIndex]
                .getAttribute('data-price');

            let mulai = new Date(document.getElementById('rent_date').value);
            let selesai = new Date(document.getElementById('return_date').value);


            if (harga && mulai && selesai) {

                let selisih = selesai - mulai;

                let hari = selisih / (1000 * 60 * 60 * 24);


                if (hari <= 0) {
                    hari = 1;
                }


                document.getElementById('total_price').value =
                    harga * hari;

            }

        }


        document.getElementById('vehicle_id')
            .addEventListener('change', hitungHarga);


        document.getElementById('rent_date')
            .addEventListener('change', hitungHarga);


        document.getElementById('return_date')
            .addEventListener('change', hitungHarga);
    </script>

    <script>
        @foreach ($rentals as $rental)

            let vehicle{{ $rental->id }} = document.getElementById('vehicle_id{{ $rental->id }}');

            let rent{{ $rental->id }} = document.querySelector(
                '#editModal{{ $rental->id }} input[name="rent_date"]'
            );

            let return{{ $rental->id }} = document.querySelector(
                '#editModal{{ $rental->id }} input[name="return_date"]'
            );

            function hitungHarga{{ $rental->id }}() {

                let price = vehicle{{ $rental->id }}.options[
                    vehicle{{ $rental->id }}.selectedIndex
                ].dataset.price;


                if (price && rent{{ $rental->id }}.value && return{{ $rental->id }}.value) {

                    let start = new Date(rent{{ $rental->id }}.value);
                    let end = new Date(return{{ $rental->id }}.value);

                    let days = Math.ceil(
                        (end - start) / (1000 * 60 * 60 * 24)
                    );


                    if (days > 0) {
                        document.querySelector(
                            '#editModal{{ $rental->id }} input[name="total_price"]'
                        ).value = price * days;
                    }

                }

            }


            vehicle{{ $rental->id }}.addEventListener('change', hitungHarga{{ $rental->id }});
            rent{{ $rental->id }}.addEventListener('change', hitungHarga{{ $rental->id }});
            return{{ $rental->id }}.addEventListener('change', hitungHarga{{ $rental->id }});
        @endforeach
    </script>
</body>

</html>

</body>

</html>
