<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        h1, h2 {
            font-weight: 600;
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: 600;
            font-size: 1.1rem;
        }
        .form-control, .form-select {
            border-radius: 0.5rem;
            border: 1px solid #ced4da;
            transition: border-color 0.2s;
            font-size: 1rem;
            padding: 12px; /* Increased padding for inputs */
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .btn-icon {
            display: inline-flex;
            align-items: center;
        }
        .btn-icon i {
            margin-right: 5px;
        }
        .btn-custom {
            background-color: #007bff; /* Bootstrap primary color */
            border-color: #007bff;
            color: white;
            transition: background-color 0.2s;
            padding: 10px 20px; /* Increased button size */
            font-size: 1rem; /* Larger button text */
        }
        .btn-custom:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-delete {
            background-color: #dc3545; /* Bootstrap danger color */
            border-color: #dc3545;
            color: white;
            transition: background-color 0.2s;
            padding: 10px 20px; /* Increased button size */
        }
        .btn-delete:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .alert {
            margin-bottom: 20px; /* Increased gap after alert */
            border-radius: 0.5rem;
        }
        .table {
            background-color: #fff;
            border-radius: 0.5rem;
            overflow: hidden;
            margin-top: 20px;
        }
        .table th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }
        .table td {
            text-align: center; /* Center align table cells */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4"><i class="fas fa-plus-circle"></i> Add Product</h1>
    
    @if (session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="invoice_number" class="form-label">Invoice Number</label>
            <input type="text" class="form-control" id="invoice_number" name="invoice_number" required>
        </div>

        <div class="mb-4">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" required>
        </div>

        <div class="mb-4">
            <label for="product_image" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="product_image" name="product_image" accept="image/*" required>
        </div>

        <div class="mb-4">
            <label for="product_price" class="form-label">Product Price ($)</label>
            <input type="number" class="form-control" id="product_price" name="product_price" step="0.01" required>
        </div>

        <div class="mb-4">
            <label for="discount" class="form-label">Discount (%)</label>
            <input type="number" class="form-control" id="discount" name="discount" min="0" max="100">
        </div>

        <div class="mb-4">
            <label for="stock_status" class="form-label">Stock Status</label>
            <select class="form-select" id="stock_status" name="stock_status" required>
                <option value="in_stock">In Stock</option>
                <option value="out_of_stock">Out of Stock</option>
            </select>
        </div>

        <button type="submit" class="btn btn-custom btn-icon">
            <i class="fas fa-plus"></i> Add Product
        </button>
        <a href="{{ route('product.index') }}" class="btn btn-secondary btn-icon ms-2">
            <i class="fas fa-times"></i> Cancel
        </a>
    </form>

    <h2 class="mt-5">Product List</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Invoice Number</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Stock Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->invoice_number }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" width="100">
                    </td>
                    <td>${{ number_format($product->product_price, 2) }}</td>
                    <td>{{ $product->discount }}%</td>
                    <td>{{ $product->stock_status }}</td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm btn-icon">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete btn-sm btn-icon" type="submit" onclick="return confirm('Are you sure you want to delete this product?');">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
