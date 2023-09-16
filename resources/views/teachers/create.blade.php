@extends('layouts.master')
@section('css')

@endsection

@section('title')
    {{ __('teacher_add.page_title') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ __('teacher_add.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('/')}}"
                                                   class="default-color">{{ __('teacher_add.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('teacher_add.page_title') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{ route('teachers.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col">
                                <label class="w-100">
                                    {{ __('teacher_add.teacher_email') }}
                                    <input type="email" name="email" class="form-control border mt-1 ">
                                </label>
                            </div>
                            <div class="col">
                                <label class="w-100">
                                    {{ __('teacher_add.teacher_password') }}
                                    <input type="password" name="password" class="form-control border mt-1 ">
                                </label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label class="w-100">
                                    {{ __('teacher_add.teacher_name_ar') }}
                                    <input type="text" name="name_ar" class="form-control border mt-1 ">
                                </label>
                            </div>
                            <div class="col">
                                <label class="w-100">
                                    {{ __('teacher_add.teacher_name_en') }}
                                    <input type="text" name="name_en" class="form-control border mt-1 ">
                                </label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label class="w-100">
                                    {{ __('teacher_add.teacher_specialization') }}
                                    <select name="specialization_id" class="custom-select mt-1">
                                        <option value="">{{ __('teacher_add.teacher_specialization') }}</option>
                                        @foreach($specializations as $specialization)
                                            <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="col">
                                <label class="w-100">
                                    {{ __('teacher_add.teacher_gender') }}
                                    <select name="gender_id" class="custom-select mt-1">
                                        <option value="">{{ __('teacher_add.teacher_gender') }}</option>
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label class="w-100">
                                    {{ __('teacher_add.teacher_join_date') }}
                                    <input type="date" name="join_date" class="form-control border mt-1 ">
                                </label>
                            </div>
                            <div class="col">
                                <label class="w-100">
                                    {{ __('teacher_add.teacher_address') }}
                                    <textarea name="address" class="form-control border mt-1" ></textarea>
                                </label>
                            </div>
                        </div>
                        <div class="row p-3">
                            <button type="submit" class="btn btn-primary btn-block mt-4">{{ __('teacher_add.add_teacher') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
