@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="product_id" class="form-label">Product ID</label>
            <input type="text" name="product_id" value="{{ $product->product_id }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <div class="col-8">
                <p class="fw-lighter">Previous Image: <img src="{{ asset('storage/' . $product->image) }}"
                                                           style="width:70px; height:70px"> </p>
                <input type="file" class="form-control mt-3" id="inputPicture" name="image"
                       value="{{ old('storage/', $product->image) }}">
                <span>
                        {{$product->image}}
                    </span>
                <input type="hidden" name="old_picture" value=" {{ old('storage/', $product->image) }}">
{{--                        @error('image')--}}
{{--                        <div class="alert alert-danger text-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
