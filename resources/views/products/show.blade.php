<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Vintage theme styling */
        body {
            background: #f4f1ea;
            font-family: 'Garamond', serif;
        }
        
        .card {
            background-color: #fdf3e2;
            border: 1px solid #d3bfa1;
        }

        .card-body h3 {
            font-family: 'Times New Roman', Times, serif;
            color: #5a3e2b;
        }

        .card-body p {
            font-family: 'Georgia', serif;
            color: #3e3e3e;
        }

        .btn {
            font-family: 'Georgia', serif;
            background-color: #6b4226;
            color: #fff;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #4e2f1e;
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .btn-primary {
            background-color: #6b4226;
        }

        .btn-primary:hover {
            background-color: #4e2f1e;
        }

        .rounded {
            border: 4px solid #d3bfa1;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        label {
            font-family: 'Georgia', serif;
            color: #5a3e2b;
        }

        input, textarea {
            border-radius: 10px;
            border: 1px solid #d3bfa1;
        }

        hr {
            border: 1px solid #d3bfa1;
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $product->title }}</h3>
                        <hr/>
                        <p>{{ "Rp " . number_format($product->price, 2, ',', '.') }}</p>
                        <code>
                            <p>{!! $product->description !!}</p>
                        </code>
                        <hr>
                        <p>Stock: {{ $product->stock }}</p>
                        
                        <!-- Form Pembelian -->
                        <form action="{{ route('buy.product', $product->id) }}" method="POST" id="buyForm">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="quantity">Jumlah Beli:</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" min="1" max="{{ $product->stock }}" required>
                            </div>
                            <button type="button" id="buyButton" class="btn btn-primary" onclick="handleBuy();">Beli Sekarang</button>
                            <a href="/shoping" class="btn btn-primary">Back to store</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Handle pembelian dengan konfirmasi
        function handleBuy() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan membeli produk ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, beli!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika user mengkonfirmasi pembelian, kirim form
                    document.getElementById('buyButton').disabled = true;
                    document.getElementById('buyForm').submit();
                }
            });
        }

        @if(session('success'))
            Swal.fire({
                title: 'Sukses!',
                html: "{!! session('success') !!}", // Menggunakan 'html' dan tidak di-escape
                icon: 'success',
            });
        @endif
    </script>
</body>
</html>
