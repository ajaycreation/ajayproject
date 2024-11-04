@extends('layouts.app') <!-- Use your layout -->

@section('content')
<div class="container">
    <h1 class="mb-4">Product List</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?');">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
