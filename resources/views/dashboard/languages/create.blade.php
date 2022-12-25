@extends('layouts.admin-dashboard')

@section('title', 'Languages')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Languages</li>
@endsection

@section('content')
    <form action="{{ route('admin.languages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label for="img">Image</label>
                <input type="file" class="form-control-file" name="img" id="img">
            </div>
            <div class="form-group">
                <label for="slogan">Slogan</label>
                <input type="text" class="form-control" name="slogan" id="slogan" placeholder="Enter Slogan">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </div>
        <!-- /.card-body -->
    </form>
@endsection
