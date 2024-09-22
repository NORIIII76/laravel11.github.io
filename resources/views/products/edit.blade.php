<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Vintage Theme */
        body {
            background: #f4f1e6;
            font-family: 'Garamond', serif;
        }

        .card {
            background: #faf3e0;
            border: 1px solid #d4c5a0;
            border-radius: 10px;
        }

        .card-body {
            padding: 20px;
            color: #5e503f;
        }

        .form-group label {
            font-weight: bold;
            color: #6b4f4f;
        }

        .form-control {
            background-color: #f8f0e3;
            border: 1px solid #c1a477;
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(133, 94, 66, 0.5);
            border-color: #d4a373;
        }

        .btn-primary {
            background-color: #6b4f4f;
            border-color: #6b4f4f;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #8c7053;
            transform: scale(1.05);
        }

        .btn-warning {
            background-color: #d9a273;
            border-color: #d9a273;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-warning:hover {
            background-color: #c2876e;
            transform: scale(1.05);
        }

        /* Animation for buttons */
        .btn {
            transition: transform 0.3s, background-color 0.3s;
        }

        .btn:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(107, 79, 79, 0.5);
        }

        .btn:active {
            transform: scale(0.95);
        }

        .alert-danger {
            background-color: #e6d0bc;
            color: #6b4f4f;
        }

        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">IMAGE</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">TITLE</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $product->title) }}" placeholder="Masukkan Judul Product">
                            
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">DESCRIPTION</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Masukkan Description Product">{{ old('description', $product->description) }}</textarea>
                            
                                @error('description')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">PRICE</label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $product->price) }}" placeholder="Masukkan Harga Product">
                                    
                                        @error('price')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">STOCK</label>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock', $product->stock) }}" placeholder="Masukkan Stock Product">
                                    
                                        @error('stock')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
</body>
</html>
