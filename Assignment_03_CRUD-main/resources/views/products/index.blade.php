@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product ID</th>
                
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->name }}</td>
                    {{-- <td><img src="data:image/jpeg;base64,{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
                    </td> --}}
                    <td>
                        @if($product->image !== null)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="" style="width:100px; height:100px;">
                        @else
                            <img src="{{ asset('image not found!') }}" alt="" style="width:100px; height:100px;">
                        @endif
                    </td>
                    <td id="description">{{$product->description}}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{$product->stock}}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>
@endsection
