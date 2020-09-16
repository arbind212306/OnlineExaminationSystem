@extends('layouts.app')
@section('title', 'Admin | Add Exam')
@section('content')
<div class="content-wrapper">
    @include('alert')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Exam Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('exams') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Exam</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ ucwords('add test / exam type')}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @if(route_name() == 'exam.edit')
                        <form action="{{ route('exam.update', ['id' => $exam->id]) }}" method="POST">
                            @method('PUT')
                            @else
                            <form action="{{ route('exam.create') }}" method="POST">
                                @endif
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="title">{{ __('Exam Title') }}</label>
                                                <input type="text" name="title"
                                                    class="form-control @error('title') is-invalid @enderror" id="title"
                                                    placeholder="{{ __('Enter exam title') }}"
                                                    value="@if(route_name() == 'exam.edit') {{ $exam->title }} @else {{ old('title') }} @endif"
                                                    autocomplete="title" autofocus>

                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="exam_date">{{ __('Exam date') }}</label>
                                                <input type="text" name="exam_date"
                                                    class="form-control datepicker @error('exam_date') is-invalid @enderror"
                                                    id="exam_date" placeholder="{{ __('Enter menu exam_date') }}"
                                                    value="@if(route_name() == 'exam.edit') {{ format_date($exam->exam_date) }} @else {{ old('exam_date') }} @endif"
                                                    autocomplete="exam_date" autofocus>

                                                @error('exam_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="exam_duration">{{ __('Exam Duration') }}</label>
                                                <input type="time" name="exam_duration"
                                                    class="form-control @error('exam_duration') is-invalid @enderror"
                                                    id="exam_duration" data-target-input="nearest"
                                                    placeholder="{{ __('Enter exam duration') }}"
                                                    value="@if(route_name() == 'exam.edit') {{ format_time($exam->exam_duration) }} @else {{ old('exam_duration') }} @endif"
                                                    autocomplete="exam_duration" autofocus>

                                                @error('exam_duration')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="description">{{ __('Description') }}</label>
                                                <input type="text" name="description"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    id="description" placeholder="{{ __('Enter exam description') }}"
                                                    value="@if(route_name() == 'exam.edit') {{ $exam->description }} @else {{ old('description') }} @endif"
                                                    autocomplete="description" autofocus>

                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="total_question">{{ __('Total Question') }}</label>
                                                <input type="number" name="total_question"
                                                    class="form-control @error('total_question') is-invalid @enderror"
                                                    id="total_question" placeholder="{{ __('Total questions') }}"
                                                    value="@if(route_name() == 'exam.edit'){{ $exam->total_question }}@else{{ old('total_question') }}@endif"
                                                    autocomplete="total_question" autofocus>

                                                @error('total_question')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qualifying_mark">{{ __('Set Qualifying Mark') }}</label>
                                                <input type="number" name="qualifying_mark"
                                                    class="form-control @error('qualifying_mark') is-invalid @enderror"
                                                    id="qualifying_mark" placeholder="{{ __('Total questions') }}"
                                                    value="@if(route_name() == 'exam.edit'){{ $exam->qualifying_mark }}@else{{ old('qualifying_mark') }}@endif"
                                                    autocomplete="qualifying_mark" autofocus>

                                                @error('qualifying_mark')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> -->
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
</div>
@endsection