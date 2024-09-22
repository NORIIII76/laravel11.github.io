<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozez Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Garamond', serif;
            background-color: #f5f5dc;
            color: #2c3e50;
        }
        .navbar {
            background-color: #a0522d;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-family: 'Garamond', serif;
            font-size: 24px;
            color: #fff !important;
        }
        .navbar-nav .nav-link {
            color: #f5f5dc !important;
        }
        .hero-section {
            padding: 100px 0;
            text-align: center;
            color: #fff;
        }
        .hero-section h1 {
            font-size: 48px;
            font-weight: bold;
        }
        .hero-section p {
            font-size: 18px;
        }
        .btn-primary {
            background-color: #b8860b;
            border-color: #b8860b;
        }
        .features-section {
            background-color: #f5f5dc;
            padding: 50px 0;
        }
        .feature-item {
            text-align: center;
            padding: 20px;
        }
        .feature-item h3 {
            font-family: 'Cinzel', serif;
            color: #2c3e50;
        }
        .feature-item p {
            font-family: 'Playfair Display', serif;
            color: #7f8c8d;
        }
        footer {
            background-color: #556b2f;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        footer p {
            font-family: 'Cinzel', serif;
            font-size: 16px;
        }
        .map-container {
            width: 100%;
            height: 0;
            padding-bottom: 56.25%; /* Aspect ratio 16:9 */
            position: relative;
        }
        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
        .navbar .btn-outline-light {
            color: #f5f5dc;
            border: 2px solid #f5f5dc;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-family: 'Cinzel', serif;
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 20px;
        }

        .navbar .btn-outline-light:hover {
            background-color: #f5f5dc;
            color: #a0522d;
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
        <ul class="navbar-nav ms-auto flex-grow-1" style="margin-left: auto;">
            <li class="nav-item">
                @if (session('username'))
                    <a href="#" data-bs-toggle="modal" data-bs-target="#userProfileModal" style="color: #fff; text-decoration: none;">
                        WELCOME, {{ session('username') }}
                    </a>
                @else
                    WELCOME, Guest
                @endif
            </li>
        </ul>


            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="/adminlogin">Admin</a>
                    </li>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-light">Logout</button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" style="position: relative; height: 100vh;">
    <video autoplay muted loop playsinline id="heroVideo" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
        <source src="{{ asset('videos/bg.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    </section>
    
    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <div class="row">
                <h2 class="text-center">Featured Products</h2>
                <hr>
                <div class="col-md-4 feature-item text-center">
                    <i class="fas fa-shoe-prints fa-3x"></i>
                    <hr style="color: #f5f5dc;">
                    <h3>Stylish Shoes</h3>
                    <p>Kombinasi sempurna antara kenyamanan dan desain modern untuk melengkapi gaya Anda.</p>
                </div>
                <div class="col-md-4 feature-item text-center">
                    <i class="fas fa-motorcycle fa-3x"></i>
                    <hr style="color: #f5f5dc;">
                    <h3>Powerful Motorcycles</h3>
                    <p>Mesin bertenaga dengan desain elegan, siap menemani setiap perjalanan Anda.</p>
                </div>
                <div class="col-md-4 feature-item text-center">
                    <i class="fas fa-mobile-alt fa-3x"></i>
                    <hr style="color: #f5f5dc;">
                    <h3>Advanced Smartphones</h3>
                    <p>Tampil dengan teknologi canggih dan desain premium untuk menunjang kebutuhan Anda.</p>
                </div>
                <div class="container d-flex justify-content-center align-items-center" style="position: relative; z-index: 1; height: 100px;">
                    <a href="/shoping" class="btn btn-primary">Explore Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section id="contact" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center">Contact Us</h2>
            <hr>
            <p class="text-center">Kami di sini untuk membantu Anda! Jika Anda memiliki pertanyaan, umpan balik, atau memerlukan bantuan terkait produk dan layanan kami, jangan ragu untuk menghubungi kami melalui informasi di bawah ini.</p>
            <hr style="color: #fff;">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Alamat:</strong> Jl. Pojok, Kab Bogor, Provinsi Jawa Barat, 16961</p>
                    <p><strong>Phone:</strong> +62 877-8710-1391</p>
                    <p><strong>Email:</strong> rozezstore@gmail.com</p>
                </div>
                <div class="col-md-6">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3092.090025028573!2d106.88635507370367!3d-6.460362663165891!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMjcnMzcuMyJTIDEwNsKwNTMnMjAuMiJF!5e1!3m2!1sen!2sid!4v1726090698449!5m2!1sen!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border-radius: 10px;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Modal for User Profile -->
<div class="modal fade" id="userProfileModal" tabindex="-1" aria-labelledby="userProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userProfileModalLabel">User Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (session('username') && session('created_at'))
                    <p><strong>Nama:</strong> {{ session('username') }}</p>
                    <p><strong>Bergabung:</strong> {{ \Carbon\Carbon::parse(session('created_at'))->format('d-m-Y H:i') }}</p>
                @else
                    <p>User data not available.</p>
                @endif
                <!-- Tambahkan detail profil lain di sini -->
            </div>
        </div>
    </div>
</div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Rozez Store. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
