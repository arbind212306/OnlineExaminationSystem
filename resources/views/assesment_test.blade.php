@extends('layouts.master')
@section('title', 'User | Assesment Test')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark" id="exam_title" data="{{ $exam->id }}"> {{ $exam->title }} <small></small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{ route('user.submit.test', ['id' => $exam->id]) }}"
                            class="card-link btn btn-block btn-outline-success btn-sm">{{ ucwords('submit test') }}</a>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" style="min-height:100%">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h5 class="card-title" data="{{$exam->questions->first()->id}}" id="assesment_title"><small id="question_number">Q{{ '1' }}. </small> @if($exam->questions->first())
                                {{ ucfirst($exam->questions->first()->title) }} @endif</h5>

                            <p class="card-text" id="assesment_description">
                                @if($exam->questions->first()->description)
                                {{ $exam->questions->first()->description }}
                                @endif
                            </p>

                            <p class="text">
                                <!-- radio -->
                                @if($options)
                                @php $count=1; $alphabet='A'; @endphp
                                @foreach($options as $option)
                                <label class="option"> <strong id="option_{{ $count }}">{{ $option->option_title }}</strong>
                                    <input type="radio" class="selected_option option_val_{{ $count }}" selected_id="" data="{{ $option->id }}" alpha-option="{{ $alphabet }}" name="radio">
                                    <span class="checkmark"></span>
                                </label>
                                @php $count++; $alphabet++; @endphp
                                @endforeach
                                @endif
                                <input type="hidden" name="hidden_selected_option" id="hidden_selected_option" selected-option="" data="">
                            </p>
                            <div class="">
                            <div class="col-md-2 ">
                                <a href="#"
                                    class="card-link btn btn-block btn-outline-primary btn-sm" id="save_answer">{{ ucwords('save answer') }}</a>
                            </div>
                            <div class="col-md-2 save-later">
                                <a href="#"
                                    class="card-link btn btn-block btn-outline-warning btn-sm" id="mark_later">{{ ucwords('mark for later') }}</a>
                            </div>
                            </div>
                            
                        </div>
                    </div><!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <a href="javascript:void(0)"
                                class="direction-btn select-direction question-attempted">{{ ucfirst('completed') }}</a>
                            <a href="javascript:void(0)"
                                class="direction-btn select-direction question-pending">{{ ucfirst('pending') }}</a>
                            <a href="javascript:void(0)" class="direction-btn select-direction ">{{ ucfirst('un-answered') }}</a>
                        </div>
                        <div class="card-body">
                            @if($questions)
                            @php $i=1; @endphp
                            @foreach($questions as $question)
                            <a href="javascript:void(0)" data="{{ $question->id }}" class="question-btn select-question question_btn_{{ $question->id }}">{{ $i }}</a>
                            @php $i++; @endphp
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
<script>
    
</script>
@endsection