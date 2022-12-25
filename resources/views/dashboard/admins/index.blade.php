@extends('layouts.admin-dashboard')

@section('title', 'Admins')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Admins</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Admins Data</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <a href="{{ route('admin.admins.create') }}" class="btn btn-sm btn-success">Add</a>
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
                            <th>Email</th>
                            <th>Language</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(@isset($admins) && !@empty($admins))
                            @foreach($admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->lang_title }}</td>
                                    <td>
                                        <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('admin.admins.delete', $admin->id) }}" method="post" style="display: inline-block;">
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
