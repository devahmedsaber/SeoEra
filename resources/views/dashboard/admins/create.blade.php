@extends('layouts.admin-dashboard')

@section('title', 'Admins')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Admins</li>
@endsection

@section('content')
    <form action="{{ route('admin.admins.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="description">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="price">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Language</label>
                <select class="form-control" name="language_id" id="language_id">
                    @foreach($languages as $language)
                        <option value="{{ $language->id }}">{{ $language->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </div>
        <!-- /.card-body -->
    </form>
@endsection
