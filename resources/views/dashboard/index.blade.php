@extends('layouts.admin-dashboard')

@section('title', 'Admin Dashboard')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Admin Dashboard</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Products Data</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm">

                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Language</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(@isset($products) && !@empty($products))
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <img src="{{ asset($product->img) }}" alt="Product Image" width="80" height="50">
                                    </td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->lang_title  }}</td>
                                </tr>
                            @endforeach
                        @else

                        @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
