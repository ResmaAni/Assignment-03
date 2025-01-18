@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product Details</h1>
    <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
    <p><strong>Name:</strong> {{ $product->name }}</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Price:</strong> ${{ $product->price }}</p>
    <p><strong>Stock:</strong> {{ $product->stock }}</p>
    <p>Image: <img src="{{asset('storage/'.$product->image)  }}" alt="{{ $product->name }}" class="img-fluid" height="500px", width="500px">
</p>
    
    
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
