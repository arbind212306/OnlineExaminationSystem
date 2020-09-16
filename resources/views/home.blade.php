@extends('layouts.master')
@section('title', 'User | Home')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> {{ ucwords('welcome to online assesment test portal') }} <small></small>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                    @include('alert')
                        <div class="card-body">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">{{ ucwords('Hey '.Auth::user()->name.',')}}<small>{{ ucwords(' please enroll yourself for the assesment test !!') }}</small></h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                    <form action="{{ route('enroll.user') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name">{{ ucwords('user name') }}</label>
                                                        <input type="text" name="name"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            id="name" placeholder="{{ __('Enter user name') }}"
                                                            value="{{ Auth::user()->name }}"
                                                            autocomplete="name" autofocus>

                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exam">{{ ucfirst('Exam Name') }}</label>
                                                        <select name="exam_id" id="exam_id"
                                                            class="form-control  @error('exam_id') is-invalid @enderror"
                                                            autofocus>
                                                            <option value="">--Select Exam--</option>
                                                            @isset($exams)
                                                            @foreach($exams as $exam)
                                                            <option value="{{ intval($exam->id) }}"
                                                                {{ old('exam_id') == $exam->id ? 'selected' : '' }}>
                                                                {{ $exam->title }}</option>
                                                            @endforeach
                                                            @endif
                                                        </select>

                                                        @error('question_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                    </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <div>
                            @if($user_registered_exam)
                            <h3>{{ ucfirst('You have following assesment to attend') }}</h3>
                            @foreach($user_registered_exam as $user_exam)
                            <a href="{{ route('user.assesment', ['id' => $user_exam->id]) }}">{{ $user_exam->title }}</a> <br>
                            @endforeach
                            @endif
                        </div>
                    </div><!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection