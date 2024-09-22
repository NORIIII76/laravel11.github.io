<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0ece3;
            font-family: 'Garamond', serif;
            color: #333;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        button, .btn {
            background-color: #8b4513;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-family: 'Cinzel', serif;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button:hover, .btn:hover {
            background-color: #a0522d;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
            transform: translateY(-3px);
        }

        button:active, .btn:active {
            background-color: #6b705c;
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        button:focus, .btn:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 235, 205, 0.6);
        }

        .btn-delete {
            background-color: #d9534f;
        }

        .btn-delete:hover {
            background-color: #c9302c;
        }

        .dashboard-wrapper {
            display: flex;
            height: 100vh;
            flex-direction: column;
        }

        .dashboard-header {
            background-color: #8b4513;
            padding: 15px;
            color: #fff;
            font-size: 20px;
            font-weight: 600;
            text-align: left;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            background-color: #8b4513;
            width: 250px;
            height: 100%;
            padding-top: 60px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin: 10px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: white;
            display: block;
            padding: 15px;
            font-family: 'Cinzel', serif;
            font-size: 18px;
            text-align: center;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover, .sidebar ul li.active a {
            background-color: #a0522d;
            border-radius: 5px;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            margin-top: 70px;
            flex-grow: 1;
            overflow-y: auto;
        }

        .main-content h2 {
            font-family: 'Cinzel', serif;
            color: #6b705c;
        }

        .card-product {
            border: 2px solid #c9ada7;
            border-radius: 10px;
            background-color: #f4f1de;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .card-product:hover {
            transform: translateY(-5px);
        }

        .card-product img {
            width: 150px;
            border-radius: 10px;
        }

        .card-content {
            flex-grow: 1;
            padding-left: 20px;
        }

        .card-content h4 {
            color: #6b705c;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-content p {
            color: #6c757d;
        }

        .card-content .price {
            color: #ddbea9;
            font-size: 18px;
            font-weight: bold;
        }

        .table-responsive {
            margin-bottom: 20px;
        }

        .form-select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 2px solid #a0522d;
            background-color: #f0ece3;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
            }
        }

        /* Responsive adjustments */
@media (max-width: 1200px) {
    .sidebar {
        width: 200px;
    }
    .main-content {
        margin-left: 200px;
    }
}

@media (max-width: 992px) {
    .sidebar {
        width: 150px;
    }
    .main-content {
        margin-left: 150px;
    }
}

@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        padding-top: 0;
        position: relative;
    }
    .main-content {
        margin-left: 0;
        padding: 10px;
    }
    .dashboard-header {
        padding: 10px;
    }
}

@media (max-width: 576px) {
    .dashboard-header {
        font-size: 16px;
    }
    .sidebar ul li a {
        font-size: 16px;
    }
    .card-product {
        flex-direction: column;
        align-items: flex-start;
    }
    .card-product img {
        width: 100%;
        max-width: 150px; /* Adjust this as needed */
    }
    .card-content {
        padding-left: 0;
    }
    .form-select {
        font-size: 14px;
    }
}

.table-responsive {
    overflow-x: hidden; /* Prevent horizontal scrolling */
}

.table {
    width: 100%;
    min-width: 10px; /* Ensures the table doesn't shrink too much */
}

@media (max-width: 576px) {
    .table th, .table td {
        font-size: 12px; /* Adjust font size for smaller screens */
    }
}

.table th, .table td {
    font-size: 14px; /* Adjust font size */
    padding: 8px; /* Reduce padding */
}

.form-select {
    font-size: 12px; /* Adjust font size */
    padding: 5px; /* Reduce padding */
    height: 30px; /* Set a fixed height */
}

.btn-vintage {
    font-size: 12px; /* Adjust font size */
    padding: 5px 10px; /* Reduce padding */
    height: 30px; /* Set a fixed height */
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .form-select {
        font-size: 14px;
        padding: 8px;
        height: auto;
    }

    .btn-vintage {
        font-size: 14px;
        padding: 8px 12px;
        height: auto;
    }
}

@media (max-width: 576px) {
    .form-select {
        font-size: 12px;
        padding: 5px;
    }

    .btn-vintage {
        font-size: 12px;
        padding: 5px 10px;
    }
}

    </style>
</head>
<body>

<div class="dashboard-wrapper">
    <div class="dashboard-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>WELCOME, Admin-Rino</span>
            </div>
        </div>
    </div>

    <div class="sidebar">
        <ul>
            <li>
                <a href="#dashboard">Dashboard</a>
            </li>
            <li>
                <a href="#products">Products</a>
            </li>
            <li>
                <a href="#history">History</a>
            </li>
            <li>
                <a href="/welcome">Logout</a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <section id="dashboard">
            <h2 class="text-center">Dashboard</h2>
            <p class="text-center">This is the main dashboard page. More content will be added here soon.</p>
        </section>

        <section id="products">
            <h2 class="text-center">Products Data</h2>
            <a href="{{ route('products.create') }}" class="btn btn-pp9 mb-4">ADD PRODUCT</a>
            @forelse ($products as $product)
                <div class="card-product">
                    <img src="{{ asset('/storage/products/'.$product->image) }}" alt="Product Image">
                    <div class="card-content">
                        <h4>{{ $product->title }}</h4>
                        <p class="price">{{ "Rp " . number_format($product->price, 2, ',', '.') }}</p>
                        <p>Stock: {{ $product->stock }}</p>
                    </div>
                    <div class="card-actions">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-pp9">EDIT</a>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">HAPUS</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">
                    Data Products belum tersedia.
                </div>
            @endforelse

            <div class="d-flex justify-content-center mt-4">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </section>

        <section id="history">
    <h2 class="text-center">Purchase History</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Purchase Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchaseHistories as $history)
                    <tr>
                        <td>{{ $history->product->title }}</td>
                        <td>{{ $history->quantity }}</td>
                        <td>Rp. {{ number_format($history->total_price, 2, ',', '.') }}</td>
                        <td>{{ $history->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            <form id="update-status-form-{{ $history->id }}" action="{{ route('purchase.update.status', ['id' => $history->id]) }}" method="POST" class="d-flex flex-column">
                                @csrf
                                @method('POST')
                                <select name="status" required class="form-select mb-2" style="flex-grow: 1;">
                                    <option value="in_process" {{ $history->status == 'in_process' ? 'selected' : '' }}>In Process</option>
                                    <option value="success" {{ $history->status == 'success' ? 'selected' : '' }}>Success</option>
                                    <option value="failed" {{ $history->status == 'failed' ? 'selected' : '' }}>Failed</option>
                                </select>
                                <button type="submit" class="btn btn-vintage w-100">Update Status</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
    // Add product notification with confirmation
    const addProductButton = document.querySelector('.btn-pp9.mb-4');
    if (addProductButton) {
        addProductButton.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent immediate navigation

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to add a new product?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, add product!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, redirect to add product page
                    window.location.href = addProductButton.getAttribute('href');
                }
            });
        });
    }

    // Edit product notification with confirmation
    const editButtons = document.querySelectorAll('.btn-pp9:not(.mb-4)');
    editButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent immediate navigation

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to edit this product?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, edit product!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, redirect to edit product page
                    window.location.href = button.getAttribute('href');
                }
            });
        });
    });

    // Delete product notification with confirmation
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent form from submitting immediately

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to delete this product?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    this.closest('form').submit();
                }
            });
        });
    });
});


    // Update status notification with confirmation
    document.querySelectorAll('form[id^="update-status-form-"]').forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form from submitting immediately

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to update the status of this purchase?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, update status!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    this.submit();
                }
            });
        });
    });

    // Success and error messages
    @if(session('success'))
    Swal.fire({
        icon: "success",
        title: "BERHASIL",
        text: "{{session('success') }}", 
        showConfirmButton: false, 
        timer: 2000
    });
    @elseif(session('error')) 
    Swal.fire({
        icon: "error",
        title: "GAGAL!",
        text: "{{ session('error') }}", 
        showConfirmButton: false, 
        timer: 2000
    });
    @endif
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Updated Successfully',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        });
        @endif
    });
</script>
</body>
</html>
