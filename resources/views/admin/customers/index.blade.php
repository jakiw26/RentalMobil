<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers</title>

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
                    <h3 class="mb-0 fw-bold"> Data Customers </h3>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <table class="table table-striped">
                            <tr>
                                <th>No</th>
                                <th>User Id</th>
                                <th>Nama</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Identity Number</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $cust)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cust->user_id }}</td>
                                        <td>{{ $cust->name }}</td>
                                        <td>{{ $cust->phone }}</td>
                                        <td>{{ $cust->address }}</td>
                                        <td>{{ $cust->identity_number }}</td>

                                        {{-- <td>
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $cust->id }}">
                                                Edit
                                            </button>

                                            <form action="/admin/delete/{{ $cust->id }}" method="POST"
                                                class="d-inline">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td> --}}
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
                        Add Customers
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body p-4">
                    <form action="/admin/store" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                User_Id
                            </label>
                            <input type="text" name="user_id" class="form-control" placeholder="Masukkan Nama"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Nama
                            </label>
                            <input type="text" name="name" class="form-control" placeholder="Masukkan Nama"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Phone
                            </label>
                            <input type="number" name="phone" class="form-control" placeholder="Masukkan Phone"
                                required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Address
                            </label>
                            <input type="teks" name="address" class="form-control" placeholder="Masukan Addres"
                            required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Identity Number
                            </label>
                            <input type="number" name="identity_number" class="form-control" placeholder="Masukan Role"
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

    @foreach ($customers as $cust)
        <div class="modal fade" id="editModal{{ $cust->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 shadow">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title fw-bold">
                            Edit Customers
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>

                    <div class="modal-body p-4">
                        <form action="/admin/update/{{ $cust->id }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    User Id
                                </label>
                                <input type="text" name="user_id" class="form-control"
                                    value="{{ $cust->user_id }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Nama
                                </label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ $cust->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Phone
                                </label>
                                <input type="number" name="phone" class="form-control"
                                    value="{{ $cust->phone }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Address
                                </label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ $cust->address }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Identity Number
                                </label>
                                <input type="number" name="identity_number" class="form-control"
                                    value="{{ $cust->identity_number }}" required>
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
