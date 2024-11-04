<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Light background for better contrast */
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2rem; /* Larger title */
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: bold; /* Bold labels */
            font-size: 1.1rem; /* Larger label text */
        }
        .form-control, .form-select {
            font-size: 1rem; /* Larger input/select text */
            padding: 10px; /* More padding for inputs */
            margin-bottom: 20px; /* Increased gap between inputs */
        }
        .btn {
            padding: 10px 20px; /* Increased button size */
            font-size: 1.1rem; /* Larger button text */
        }
        .alert {
            margin-bottom: 20px; /* Gap after alert */
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4"><i class="fas fa-edit"></i> Edit Product</h1>

    @if (session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="invoice_number" class="form-label">Invoice Number</label>
            <input type="text" class="form-control" id="invoice_number" name="invoice_number" value="{{ $product->invoice_number }}" required>
        </div>

        <div class="mb-4">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" required>
        </div>

        <div class="mb-4">
            <label for="product_image" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="product_image" name="product_image" accept="image/*">
            <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" width="100" class="mt-2">
        </div>

        <div class="mb-4">
            <label for="product_price" class="form-label">Product Price ($)</label>
            <input type="number" class="form-control" id="product_price" name="product_price" value="{{ $product->product_price }}" step="0.01" required>
        </div>

        <div class="mb-4">
            <label for="discount" class="form-label">Discount (%)</label>
            <input type="number" class="form-control" id="discount" name="discount" value="{{ $product->discount }}" min="0" max="100">
        </div>

        <div class="mb-4">
            <label for="stock_status" class="form-label">Stock Status</label>
            <select class="form-select" id="stock_status" name="stock_status" required>
                <option value="in_stock" {{ $product->stock_status == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                <option value="out_of_stock" {{ $product->stock_status == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Product</button>
        <a href="{{ route('product.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
    </form>
</div>
</body>
</html>
