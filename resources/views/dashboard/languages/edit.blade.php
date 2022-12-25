@extends('layouts.admin-dashboard')

@section('title', 'Languages')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Languages</li>
@endsection

@section('content')
    <form action="{{ route('admin.languages.update', $language->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $language->title }}">
            </div>
            <div class="form-group">
                <img src="{{ asset($language->img) }}" alt="language Image" width="150" height="150">
            </div>
            <div class="form-group">
                <label for="img">Image</label>
                <input type="file" class="form-control-file" name="img" id="img">
            </div>
            <div class="form-group">
                <label for="slogan">Slogan</label>
                <input type="text" class="form-control" name="slogan" id="slogan" value="{{ $language->slogan }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
        <!-- /.card-body -->
    </form>
@endsection
