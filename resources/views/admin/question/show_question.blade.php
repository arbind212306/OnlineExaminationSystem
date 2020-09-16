@extends('layouts.app')
@section('title', 'Admin | Question List')
@section('content')
<div class="content-wrapper">
    @include('alert')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Question</h1>
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
                            <h3 class="card-title">List of Questions</h3>
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
                                        <th>Exam Name</th>
                                        <th>Description</th>
                                        <th>Exam</th>
                                        <th style="width: 10px;">Valid Option</th>
                                        <th style="width: 10px;">Valid Marks</th>
                                        <th style="width: 10px;">Wrong Marks</th>
                                        <th>created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($questions)
                                    @foreach($questions as $question)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $question->title }}</td>
                                        <td>{{ $question->description }}</td>
                                        <td>{{ $question->exam->title }}</td>
                                        <td>{{ $question->valid_option }}</td>
                                        <td>{{ $question->valid_mark }}</td>
                                        <td>{{ $question->wrong_mark }}</td>
                                        <td>{{ date_string($question->created_at) }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('question.edit',['id' => $question->id]) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('question.delete',['id' => $question->id]) }}" onclick="event.preventDefault();
                                                document.getElementById('delete-form-{{ $question->id }}').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form id="delete-form-{{ $question->id }}" action="{{ route('question.delete', ['id' => $question->id]) }}" 
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