@extends('layouts.master')
@section('css')
    @livewireStyles
@endsection

@section('title')
    {{ __('student_add.page_title') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ __('student_add.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('/')}}"
                                                   class="default-color">{{ __('grades_list.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('student_add.page_title') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <livewire:add-student/>

@endsection
@section('js')
    @livewireScripts
@endsection
