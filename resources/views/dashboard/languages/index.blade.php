@extends('layouts.admin-dashboard')

@section('title', 'Languages')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Languages</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Languages Data</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <a href="{{ route('admin.languages.create') }}" class="btn btn-sm btn-success">Add</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Slogan</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(@isset($languages) && !@empty($languages))
                            @foreach($languages as $language)
                                <tr>
                                    <td>{{ $language->id }}</td>
                                    <td>{{ $language->title }}</td>
                                    <td>
                                        <img src="{{ asset($language->img) }}" alt="Language Image" width="80" height="50">
                                    </td>
                                    <td>{{ $language->slogan }}</td>
                                    <td>
                                        <a href="{{ route('admin.languages.edit', $language->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('admin.languages.delete', $language->id) }}" method="post" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="confirm('Are You Sure You Want To Delete This ?')">Delete</button>
                                        </form>
                                    </td>
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
