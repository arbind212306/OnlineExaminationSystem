@extends('layouts.app')
@section('title', 'Admin | Enrolled User List')
@section('content')
<div class="content-wrapper">
    @include('alert')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Enrolled User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Enrolled User</li>
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
                            <h3 class="card-title">List of Enrolled Users</h3>
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
                                        <th style="width: 10px;">Exam Name</th>
                                        <th style="width: 10px;">Is User Active</th>
                                        <th>Registered On</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($enrolled_users)
                                    @foreach($enrolled_users as $enrolled_user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $enrolled_user->name }}</td>
                                        <td>{{ $enrolled_user->email }}</td>
                                        <td>{{ $enrolled_user->phone }}</td>
                                        <td>{{ $enrolled_user->gender }}</td>
                                        <td>{{ $enrolled_user->title }}</td>
                                        <td><span class="status {{ $enrolled_user->is_active == 0 ? 'badge badge-danger' : 'badge badge-success' }}">{{ $enrolled_user->is_active == 0 ? 'Inactive' : 'Active' }}</span></td>
                                        <td>{{ date_string($enrolled_user->created_at) }}</td>
                                        <td><a href="{{ route('change.status.enrolled.user', ['id' => $enrolled_user->id]) }}" user-data="{{ $enrolled_user->id }}" class="status-btn"><span class="status {{ $enrolled_user->status == 0 ? 'badge badge-danger' : 'badge badge-success' }}">{{ $enrolled_user->status == 0 ? 'Inactive' : 'Active' }}</td>
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