@extends('layouts.app')
@section('title', 'Admin | Exam List')
@section('content')
<div class="content-wrapper">
    @include('alert')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Exams</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Exams</li>
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
                            <h3 class="card-title">List of Exams</h3>
                            <div class="col-md-2 card-tools">
                                <a href="{{ route('exam.add') }}" class="btn btn-block btn-primary btn-sm">Add Exam</a>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Exam Name</th>
                                        <th>Description</th>
                                        <th>Exam Date</th>
                                        <th style="width: 10px">Exam Duration</th>
                                        <th style="width: 10px">Total Questions</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($exams)
                                    @foreach($exams as $exam)
                                    <tr>
                                        <td>{{ $exam->title }}</td>
                                        <td>{{ $exam->description }}</td>
                                        <td>{{ date_string($exam->exam_date) }}</td>
                                        <td>{{ $exam->exam_duration }}</td>
                                        <td>{{ $exam->total_question}}</td>
                                        <td><span class="badge badge-success">{{ is_active($exam->status) }}</span></td>
                                        <td>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('exam.edit',['id' => $exam->id]) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('exam.delete',['id' => $exam->id]) }}" onclick="event.preventDefault();
                                                document.getElementById('delete-form-{{ $exam->id }}').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form id="delete-form-{{ $exam->id }}" action="{{ route('exam.delete', ['id' => $exam->id]) }}" 
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