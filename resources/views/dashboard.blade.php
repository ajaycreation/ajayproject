<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #a8e0ff, #d4f4ff);
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 1000;
        }
        .logo {
            width: 50px;
            height: 50px;
            background-color: #007bff;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 24px;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
        }
        .brand-name {
            margin-left: 10px;
            font-size: 24px;
            font-weight: 600;
            color: #333;
            font-family: 'Poppins', sans-serif;
        }
        .nav-items {
            margin-left: auto;
            display: flex;
            gap: 20px;
        }
        .nav-item, .logout-btn {
            display: flex;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            color: black;
            background-color: transparent;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .nav-item:hover, .logout-btn:hover {
            background-color: #e0e0e0;
        }
        .info-card {
            margin-top: 80px; /* Space for fixed header */
            width: 90%;
            max-width: 1200px;
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .product-card {
            background: #f9f9f9;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }
        .product-image {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .product-name {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 10px 0;
        }
        .price, .discount, .status {
            font-size: 1rem;
        }
        .price {
            color: #28a745; /* Green */
        }
        .discount {
            color: #dc3545; /* Red */
        }
        .status {
            color: #ffc107; /* Yellow */
        }
    </style>
</head>
<body>

<header class="header">
    <div class="logo">TC</div>
    <div class="brand-name">Technest Computers</div>
    <div class="nav-items">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                Logout
            </button>
        </form>
    </div>
</header>

<div class="info-card">
    <h2>Product Inventory</h2>
    <div class="product-grid">
        @foreach ($products as $product)
            <div class="product-card">
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="product-image">
                <h5 class="product-name">{{ $product->product_name }}</h5>
                <p class="price"><i class="fas fa-dollar-sign"></i> ${{ $product->product_price }}</p>
                <p class="discount"><i class="fas fa-tags"></i> {{ $product->discount }}% Off</p>
                <p class="status"><i class="fas fa-check-circle"></i> {{ $product->stock_status }}</p>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
