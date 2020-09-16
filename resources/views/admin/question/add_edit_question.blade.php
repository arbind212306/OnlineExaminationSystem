@extends('layouts.app')
@section('title', 'Admin | Add Question')
@section('content')
<div class="content-wrapper">
    @include('alert')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ ucwords('question form') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('questions') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Question</li>
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
                            <h3 class="card-title">{{ ucwords('add question for test')}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @if(route_name() == 'question.edit')
                        <form action="{{ route('question.update', ['id' => $question->id]) }}" method="POST">
                            @method('PUT')
                            @else
                            <form action="{{ route('question.create') }}" method="POST">
                                @endif
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="title">{{ ucfirst('question Title') }}</label>
                                                <input type="text" name="title"
                                                    class="form-control @error('title') is-invalid @enderror" id="title"
                                                    placeholder="{{ __('Enter question title') }}"
                                                    value="@if(route_name() == 'question.edit'){{ $question->title }}@else{{ old('title') }}@endif"
                                                    autocomplete="title" autofocus>

                                                @error('title')
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
                                                    <option value="{{ $exam->id }}"
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
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">{{ __('Question description') }}</label>
                                                <textarea name="description" id="" cols="30" rows="5"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    autofocus>
                                                @if(route_name() == 'question.edit') {{ $question->description }} @else {{ old('description') }} @endif
                                                </textarea>

                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="option_title.0">{{ ucfirst('first option') }}</label>
                                                <input type="text" name="option_title[]"
                                                    class="form-control @error('option_title.0') is-invalid @enderror"
                                                    id="option_title.0" placeholder="{{ __('Enter wrong mark') }}"
                                                    value="@if(route_name() == 'question.edit' && isset($question->options[0])){{ $question->options[0]->option_title }}@else{{ old('option_title'[0]) }}@endif"
                                                    autocomplete="option_title" autofocus>

                                                <!-- @if ($errors->has('option_title.0'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('option_title.0') }}</strong>
                                                </span>
                                                @endif -->
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="option_title.1">{{ ucfirst('second option') }}</label>
                                                <input type="text" name="option_title[]"
                                                    class="form-control @error('option_title.1') is-invalid @enderror"
                                                    id="option_title.1" data-target-input="nearest"
                                                    placeholder="{{ __('Enter valid marks') }}"
                                                    value="@if(route_name() == 'question.edit' && isset($question->options[2])){{ $question->options[1]->option_title }}@else{{ old('option_title'[1]) }}@endif"
                                                    autocomplete="option_title.1" autofocus>

                                                <!-- @if ($errors->has('option_title.1'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('option_title.1') }}</strong>
                                                </span>
                                                @endif -->
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="option_title.2">{{ ucfirst('third option') }}</label>
                                                <input type="text" name="option_title[]"
                                                    class="form-control @error('option_title.2') is-invalid @enderror"
                                                    id="option_title.2" data-target-input="nearest"
                                                    placeholder="{{ __('Enter valid marks') }}"
                                                    value="@if(route_name() == 'question.edit' && isset($question->options[2])){{ $question->options[2]->option_title }}@else{{ old('option_title'[2]) }}@endif"
                                                    autocomplete="option_title.2" autofocus>

                                                <!-- @if ($errors->has('option_title.2'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('option_title.2') }}</strong>
                                                </span>
                                                @endif -->
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="option_title">{{ ucfirst('fourth option') }}</label>
                                                <input type="text" name="option_title[]"
                                                    class="form-control @error('option_title.3') is-invalid @enderror"
                                                    id="option_title.3" data-target-input="nearest"
                                                    placeholder="{{ __('Enter valid marks') }}"
                                                    value="@if(route_name() == 'question.edit' && isset($question->options[3])){{ $question->options[3]->option_title }}@else{{ old('option_title'[3]) }}@endif"
                                                    autocomplete="option_title.3" autofocus>

                                                <!-- @if ($errors->has('option_title.3'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('option_title.3') }}</strong>
                                                </span>
                                                @endif -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="valid option">{{ ucfirst('valid option') }}</label>
                                                <select name="valid_option" id="valid_option"
                                                    class="form-control @error('valid_option') is-invalid @enderror"
                                                    autofocus>
                                                    <option value="">--Select Valid Option--</option>
                                                    @foreach($options = options() as $option)
                                                    <option value="{{$option}}"
                                                        {{ old('valid_option') == $option ? 'selected' : '' }}>
                                                        {{ $option }}</option>
                                                    @endforeach
                                                </select>

                                                @error('valid_option')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="valid_mark">{{ ucfirst('valid marks') }}</label>
                                                <input type="text" name="valid_mark"
                                                    class="form-control @error('valid_mark') is-invalid @enderror"
                                                    id="valid_mark" data-target-input="nearest"
                                                    placeholder="{{ __('Enter valid marks') }}"
                                                    value="@if(route_name() == 'question.edit'){{ $question->valid_mark }}@else{{ old('valid_mark') }}@endif"
                                                    autocomplete="valid_mark" autofocus>

                                                @error('valid_mark')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="wrong_mark">{{ ucfirst('wrong mark') }}</label>
                                                <input type="text" name="wrong_mark"
                                                    class="form-control @error('wrong_mark') is-invalid @enderror"
                                                    id="wrong_mark" placeholder="{{ __('Enter wrong mark') }}"
                                                    value="@if(route_name() == 'question.edit'){{ $question->wrong_mark }}@else{{ old('wrong_mark') }}@endif"
                                                    autocomplete="wrong_mark" autofocus>

                                                @error('wrong_mark')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="questionpleCheck1">
                                    <label class="form-check-label" for="questionpleCheck1">Check me out</label>
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