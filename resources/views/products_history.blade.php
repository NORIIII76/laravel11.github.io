<!DOCTYPE html>
<html>
<head>
    <title>History</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Garamond', serif;
            background-color: #e0d8c7;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #a0522d;
            position: sticky; /* Use sticky */
            top: 0;
            z-index: 1000; /* Ensure it stays above other content */
            padding: 10px;
        }


        .navbar .logo {
            font-size: 20px;
            font-weight: bold;
        }

        .navbar .menu a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            font-size: 14px;
        }

        .navbar .menu a:hover {
            background-color: #7a5e47;
        }

        /* Container Styles */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Header Styles */
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #8e735b;
            text-align: center;
        }

        /* Table Styles */
        .table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #8e735b;
        }

        .table th, .table td {
            padding: 8px 6px;
            text-align: left;
            border: 1px solid #8e735b;
            font-size: 15px;
        }

        .table thead {
            background-color: #8e735b;
            color: #fff;
        }

        .table th {
            font-weight: bold;
        }

        .table tbody tr:hover {
            background-color: #f5f5f5;
        }

        /* Back Button Styles */
        .back-button {
            display: inline-block;
            padding: 6px 12px;
            font-size: 12px;
            color: #fff;
            background-color: #8e735b;
            border: none;
            border-radius: 4px;
            text-decoration: none; /* Remove underline */
            text-align: center;
            transition: background-color 0.3s ease;
            outline: none; /* Remove outline */
            box-shadow: none; /* Remove box shadow */
        }

        /* Hover State */
        .back-button:hover {
            background-color: #7b5f47;
            color: #000;
            text-decoration: none; /* Ensure underline does not appear */
        }

        /* Active State */
        .back-button:active {
            background-color: #6b4a38;
            text-decoration: none; /* Ensure underline does not appear */
        }

        /* Focus State */
        .back-button:focus {
            outline: none; /* Remove focus outline */
            box-shadow: none; /* Remove focus box shadow */
            text-decoration: none; /* Ensure underline does not appear */
        }

        /* Footer Styles */
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

        /* Responsive Table */
        @media screen and (max-width: 768px) {
            .table th, .table td {
                padding: 6px 4px;
                font-size: 10px;
            }
        }

        @media screen and (max-width: 480px) {
            .table th, .table td {
                padding: 4px 2px;
                font-size: 8px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand text-white" href="#">Rozez Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/welcome">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/shoping">Store</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Purchase History</h1>
        <table class="table">
        <thead>
    <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Purchase Date</th>
        <th>Status</th> <!-- Tambahkan kolom Status -->
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    @foreach ($purchaseHistories as $history)
        <tr>
            <td>{{ $history->product->title }}</td>
            <td>{{ $history->quantity }}</td>
            <td>Rp. {{ number_format($history->total_price, 2, ',', '.') }}</td>
            <td>{{ $history->created_at->format('d-m-Y H:i') }}</td>
            <td>{{ ucfirst($history->status) }}</td> <!-- Tampilkan status -->
            <td><a href="/products/{{ $history->product->id }}" class="back-button">Back to Product</a></td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Rozez Store. All rights reserved.</p>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
