<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maintenance</title>

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
                    <h3 class="mb-0 fw-bold">Maintenance </h3> <button
                        class="btn btn-light text-primary fw-semibold rounded-pill px-4" data-bs-toggle="modal"
                        data-bs-target="#tambahMaintenanceModal"> + Tambah Data </button>
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
                                <th>Action</th>
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

                                        <td>

                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editMaintenanceModal{{ $maintenance->id }}">
                                                Edit
                                            </button>


                                            <form action="/admin/maintenance/delete/{{ $maintenance->id }}"
                                                method="POST" class="d-inline">

                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger btn-sm">
                                                    Hapus
                                                </button>

                                            </form>

                                        </td>

                                    </tr>


                                    <!-- MODAL EDIT TARUH DISINI -->

                                    <div class="modal fade" id="editMaintenanceModal{{ $maintenance->id }}"
                                        tabindex="-1">

                                        <div class="modal-dialog modal-lg modal-dialog-centered">

                                            <div class="modal-content">

                                                <div class="modal-header bg-dark text-white">

                                                    <h5 class="modal-title">
                                                        Edit Maintenance
                                                    </h5>

                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal">
                                                    </button>

                                                </div>


                                                <div class="modal-body">

                                                    <form action="/admin/maintenance/update/{{ $maintenance->id }}"
                                                        method="POST">

                                                        @csrf
                                                        @method('PUT')


                                                        <div class="mb-3">

                                                            <label>Vehicle</label>

                                                            <select name="vehicle_id" class="form-select">

                                                                @foreach ($vehicles as $vehicle)
                                                                    <option value="{{ $vehicle->id }}"
                                                                        {{ $maintenance->vehicle_id == $vehicle->id ? 'selected' : '' }}>

                                                                        {{ $vehicle->brand }}
                                                                        {{ $vehicle->model }}
                                                                        -
                                                                        {{ $vehicle->plate_number }}

                                                                    </option>
                                                                @endforeach

                                                            </select>

                                                        </div>


                                                        <div class="mb-3">

                                                            <label>Description</label>

                                                            <textarea name="description" class="form-control">

{{ $maintenance->description }}

                        </textarea>

                                                        </div>


                                                        <div class="mb-3">

                                                            <label>Cost</label>

                                                            <input type="number" name="cost" class="form-control"
                                                                value="{{ $maintenance->cost }}">

                                                        </div>


                                                        <div class="mb-3">

                                                            <label>Service Date</label>

                                                            <input type="date" name="service_date"
                                                                class="form-control"
                                                                value="{{ $maintenance->service_date }}">

                                                        </div>


                                                        <div class="mb-3">

                                                            <label>Status</label>

                                                            <select name="status" class="form-select">

                                                                <option value="process"
                                                                    {{ $maintenance->status == 'process' ? 'selected' : '' }}>
                                                                    Process
                                                                </option>


                                                                <option value="completed"
                                                                    {{ $maintenance->status == 'completed' ? 'selected' : '' }}>
                                                                    Completed
                                                                </option>

                                                            </select>

                                                        </div>


                                                        <button class="btn btn-warning">
                                                            Update
                                                        </button>


                                                    </form>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahMaintenanceModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow">

                <div class="modal-header bg-dark text-white">

                    <h5 class="modal-title fw-bold">
                        Add Maintenance
                    </h5>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body p-4">


                    <form action="/admin/maintenance/store" method="POST">

                        @csrf


                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Vehicle
                            </label>


                            <select name="vehicle_id" class="form-select" required>


                                <option value="">
                                    -- Pilih Vehicle --
                                </option>


                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">

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
                                Description
                            </label>


                            <textarea name="description" class="form-control" rows="3"
                                placeholder="Masukkan deskripsi kerusakan/perawatan" required></textarea>

                        </div>



                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Cost
                            </label>


                            <input type="number" name="cost" class="form-control"
                                placeholder="Masukkan biaya maintenance" required>

                        </div>



                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Service Date
                            </label>


                            <input type="date" name="service_date" class="form-control" required>

                        </div>



                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Status
                            </label>


                            <select name="status" class="form-select" required>


                                <option value="process">
                                    Process
                                </option>


                                <option value="completed">
                                    Completed
                                </option>


                            </select>

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

    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09cYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

</body>

</html>
