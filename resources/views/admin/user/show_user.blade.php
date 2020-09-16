@extends('layouts.app')
@section('title', 'Admin | User List')
@section('content')
<div class="content-wrapper">
    @include('alert')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of Users</h3>
                            <div class="col-md-2 card-tools">
                                <a href="{{ route('question.add') }}" class="btn btn-block btn-primary btn-sm">Add Question</a>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">S.No</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>Phone</th>
                                        <th style="width: 10px;">Gender</th>
                                        <th style="width: 10px;">Address</th>
                                        <th style="width: 10px;">Status</th>
                                        <th>Registered On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($users)
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td><a href="{{ route('user.change.status', ['id' => $user->id]) }}" user-data="{{ $user->id }}" class="status-btn"><span class="status {{ $user->is_active == 0 ? 'badge badge-danger' : 'badge badge-success' }}">{{ $user->is_active == 0 ? 'Inactive' : 'Active' }}</span></a></td>
                                        <td>{{ date_string($user->created_at) }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('user.edit',['id' => $user->id]) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('user.delete',['id' => $user->id]) }}" onclick="event.preventDefault();
                                                document.getElementById('delete-form-{{ $user->id }}').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form id="delete-form-{{ $user->id }}" action="{{ route('user.delete', ['id' => $user->id]) }}" 
                                            method="post" style="display:none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->

                </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection