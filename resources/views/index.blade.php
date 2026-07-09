# Landing Page Rental Mobil - Bootstrap Responsive

```html
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveRent - Rental Mobil</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1920&auto=format&fit=crop') center/cover;
            min-height: 100vh;
            color: white;
            display: flex;
            align-items: center;
        }

        .hero h1 {
            font-size: 60px;
            font-weight: bold;
        }

        .hero p {
            font-size: 18px;
        }

        .btn-custom {
            background-color: #ffc107;
            color: black;
            font-weight: bold;
            border-radius: 10px;
            padding: 12px 25px;
        }

        .btn-custom:hover {
            background-color: #ffca2c;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .car-card img {
            height: 220px;
            object-fit: cover;
        }

        .feature-box {
            padding: 30px;
            border-radius: 15px;
            background-color: #f8f9fa;
            transition: 0.3s;
        }

        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #111;
            color: white;
            padding: 20px 0;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="#">
                <img src="https://cdn-icons-png.flaticon.com/512/744/744465.png" alt="Logo" width="40"
                    height="40">
                <span>DriveRent</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cars">Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container text-center">
            <h1>Sewa Mobil Jadi Lebih Mudah</h1>
            <p class="mt-3 mb-4">
                Rental mobil terpercaya dengan harga terjangkau,
                kendaraan nyaman, dan pelayanan terbaik.
            </p>

            <a href="/login" class="btn btn-custom btn-lg">
                Lihat Mobil
            </a>
        </div>
    </section>

    <!-- Features -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center g-4">

                <div class="col-md-4">
                    <div class="feature-box h-100">
                        <i class="bi bi-car-front-fill display-4 text-warning"></i>
                        <h4 class="mt-3">Mobil Berkualitas</h4>
                        <p>Kendaraan selalu bersih, nyaman, dan siap digunakan.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-box h-100">
                        <i class="bi bi-cash-stack display-4 text-warning"></i>
                        <h4 class="mt-3">Harga Terjangkau</h4>
                        <p>Harga rental murah dengan kualitas pelayanan terbaik.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-box h-100">
                        <i class="bi bi-headset display-4 text-warning"></i>
                        <h4 class="mt-3">Support 24 Jam</h4>
                        <p>Tim kami siap membantu kapan saja Anda membutuhkan.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Cars Section -->
    <section class="py-5 bg-light" id="cars">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="section-title">Mobil Populer</h2>
                <p>Pilih kendaraan terbaik sesuai kebutuhan Anda</p>
            </div>

            <div class="row g-4">

                <div class="col-md-4">
                    <div class="card car-card shadow border-0 h-100">
                        <img src="https://images.unsplash.com/photo-1550355291-bbee04a92027?q=80&w=1200&auto=format&fit=crop"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Toyota Fortuner</h5>
                            <p class="card-text">
                                Mobil SUV premium nyaman untuk perjalanan keluarga.
                            </p>
                            <h5 class="text-warning">Rp700.000 / hari</h5>
                            <button class="btn btn-dark w-100 mt-3">Rental Sekarang</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card car-card shadow border-0 h-100">
                        <img src="https://images.unsplash.com/photo-1544636331-e26879cd4d9b?q=80&w=1200&auto=format&fit=crop"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Honda Civic</h5>
                            <p class="card-text">
                                Sedan modern dengan desain elegan dan sporty.
                            </p>
                            <h5 class="text-warning">Rp500.000 / hari</h5>
                            <button class="btn btn-dark w-100 mt-3">Rental Sekarang</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card car-card shadow border-0 h-100">
                        <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=1200&auto=format&fit=crop"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Toyota Avanza</h5>
                            <p class="card-text">
                                Cocok untuk kebutuhan harian dan perjalanan wisata.
                            </p>
                            <h5 class="text-warning">Rp350.000 / hari</h5>
                            <button class="btn btn-dark w-100 mt-3">Rental Sekarang</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="py-5" id="services">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="section-title">Layanan Kami</h2>
            </div>

            <div class="row g-4 text-center">

                <div class="col-md-3">
                    <div class="feature-box">
                        <i class="bi bi-person-check display-5 text-warning"></i>
                        <h5 class="mt-3">Driver Profesional</h5>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="feature-box">
                        <i class="bi bi-airplane display-5 text-warning"></i>
                        <h5 class="mt-3">Antar Jemput Bandara</h5>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="feature-box">
                        <i class="bi bi-geo-alt display-5 text-warning"></i>
                        <h5 class="mt-3">Perjalanan Wisata</h5>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="feature-box">
                        <i class="bi bi-calendar-check display-5 text-warning"></i>
                        <h5 class="mt-3">Booking Online</h5>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="py-5 bg-dark text-white" id="contact">
        <div class="container">
            <div class="row align-items-center g-4">

                <div class="col-lg-6 text-center text-lg-start">
                    <h2 class="section-title">Hubungi Kami</h2>
                    <p>📍 Bandung, Indonesia</p>
                    <p>📞 0812-3456-7890</p>
                    <p>✉️ driverent@gmail.com</p>
                </div>

                <div class="col-lg-6">
                    <div class="ratio ratio-16x9 rounded overflow-hidden shadow">
                        <iframe src="https://www.google.com/maps?q=IDE+LPKIA+Bandung&output=embed" allowfullscreen=""
                            loading="lazy">
                        </iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p class="mb-0">© 2026 DriveRent - Rental Mobil</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
