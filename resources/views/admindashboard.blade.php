<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f0f4f8;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            font-family: 'Poppins', sans-serif;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .brand-name {
            font-size: 24px;
            font-weight: 600;
            color: #333;
        }
        .logout-btn, .action-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 10px;
        }
        .logout-btn:hover, .action-btn:hover {
            background-color: #0056b3;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .welcome-message {
            font-size: 36px;
            color: #333;
            margin: 0 0 20px 0;
        }
        .table thead th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<header class="header">
    <div class="brand-name">Admin Dashboard</div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">
            Logout
        </button>
    </form>
</header>

<div class="content">
    <h1 class="welcome-message">Welcome to the Admin Dashboard!</h1>

    <h2 class="mt-4">User Management</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Active Status</th>
                <th>Time Spent (minutes)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->usertype === 0 ? 'User' : 'Admin' }}</td>
                    <td>{{ $user->isActive() ? 'Active' : 'Inactive' }}</td>
                    <td>{{ $user->time_spent ?? 0 }}</td>
                    <td>
                        <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="mt-4">Product Management</h2>
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('product.store') }}" class="btn btn-primary">Add Product</a>
</div>
<table class="table table-bordered">
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
                <td>{{ $product->invoice_number }}</td> <!-- Adjust this field if needed -->
                <td>{{ $product->product_name }}</td>
                <td>
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" style="width: 50px; height: auto;">
                </td>
                <td>Rs.{{ $product->product_price }}</td>
                <td>{{ $product->discount }}%</td>
                <td>{{ $product->stock_status }}</td> <!-- Assuming this field exists -->
                <td>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



    <h2 class="mt-4">Recent Activities</h2>
    <ul class="list-group">
        <li class="list-group-item">User John Doe logged in.</li>
        <li class="list-group-item">User Jane Smith registered.</li>
        <li class="list-group-item">User Mike Johnson updated their profile.</li>
    </ul>
</div>

</body>
</html>
