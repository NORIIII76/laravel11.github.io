<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozez Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Garamond', serif;
            background-color: #f4e4d4; /* Light beige for vintage feel */
            color: #4f3e2e; /* Darker brown for text */
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #a0522d;
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 0.5rem 1rem;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #f9f9f9 !important;
        }
        .navbar-nav .nav-link {
            color: #f9f9f9 !important;
            font-weight: 500;
        }
        .navbar-nav .nav-link:hover {
            color: #c9b499 !important; /* Softer hover color */
        }
        .card {
            margin-bottom: 30px;
            border: 1px solid #8b5e3c; /* Subtle brown border */
            border-radius: 10px;
            overflow: hidden;
            background-color: #f8f1e9; /* Light vintage background */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            height: 425px;
            width: 100%;
            object-fit: cover;
        }
        .card-title {
            font-weight: bold;
            font-size: 1.25rem;
            margin-bottom: 10px;
            color: #4f3e2e; /* Brown title */
        }
        .card-body {
            padding: 20px;
            flex: 1;
        }
        .container {
            margin-top: 30px;
            flex: 1;
        }
        h1 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.5rem;
            font-weight: 700;
            color: #4f3e2e; /* Dark brown for headers */
        }
        .btn-primary {
            background-color: #8b5e3c;
            border-color: #8b5e3c;
        }
        .btn-primary:hover {
            background-color: #71492d;
            border-color: #6c4730;
        }
        .footer {
            background-color: #556b2f;
            color: #f9f9f9;
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #ddd;
        }
        .footer p {
            margin: 0;
            font-size: 0.9rem;
        }
        .decorative-heading img {
            margin-bottom: 15px;
        }
        .welcome-message {
            font-size: 1.75rem;
            color: #8b5e3c;
            margin-bottom: 10px;
            font-weight: bold;
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
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Featured Products</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/welcome">Home</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/purchase_history">History</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Welcome and Decorative Section -->
    <div class="container text-center mb-4">
        <h2 class="welcome-message">Selamat Berbelanja di Rozez Store!</h2>
        <p>Kami menyediakan produk terbaik dan harga terjangkau. Temukan yang Anda suka!</p>
    </div>
    <!-- Products Section -->
    <div class="container">
        <h1>Product Kami</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('/storage/products/'.$product->image) }}" class="card-img-top" alt="{{ $product->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p><strong>Stock : {{ $product->stock }}</strong></p>
                            <p><strong>{{ "Rp " . number_format($product->price,2,',','.') }}</strong></p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

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

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Rozez Store. All rights reserved.</p>
    </footer>

    <!-- Optional JavaScript and Bootstrap Dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
