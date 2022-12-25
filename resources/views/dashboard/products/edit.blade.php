@extends('layouts.admin-dashboard')

@section('title', 'Products')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Products</li>
@endsection

@section('content')
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="3" name="description" id="description" placeholder="Enter Description">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <img src="{{ asset($product->img) }}" alt="Product Image" width="150" height="150">
            </div>
            <div class="form-group">
                <label for="img">Image</label>
                <input type="file" class="form-control-file" name="img" id="img">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price" step="0.1" value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <label>Language</label>
                <select class="form-control" name="language_id" id="language_id">
                    @foreach($languages as $language)
                        <option value="{{ $language->id }}" {{ $product->language_id === $language->id ? 'selected' : '' }}>{{ $language->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
        <!-- /.card-body -->
    </form>
@endsection
