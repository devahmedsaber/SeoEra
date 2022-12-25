@extends('layouts.admin-dashboard')

@section('title', 'Admins')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Admins</li>
@endsection

@section('content')
    <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $admin->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{ $admin->email }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Language</label>
                <select class="form-control" name="language_id" id="language_id">
                    @foreach($languages as $language)
                        <option value="{{ $language->id }}" {{ $admin->language_id === $language->id ? 'selected' : '' }}>{{ $language->title }}</option>
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
