@extends('layouts.master')
@section('css')

@endsection

@section('title')
    {{ __('teacher_edit.page_title') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ __('teacher_edit.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('/')}}"
                                                   class="default-color">{{ __('teacher_edit.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('teacher_edit.page_title') }}</li>
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
                    <form action="{{ route('teachers.update',$teacher->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <label class="w-100">
                                    {{ __('teacher_edit.teacher_email') }}
                                    <input type="email" name="email" value="{{ old('email') ?: $teacher->email }}"
                                           class="form-control border mt-1 ">
                                </label>
                            </div>
                            <div class="col">
                                <label class="w-100">
                                    {{ __('teacher_edit.teacher_password') }}
                                    <input type="password" name="password"
                                           value=" {{ old('password') ?: $teacher->pasword }} "
                                           class="form-control border mt-1" readonly>
                                </label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label class="w-100">
                                    {{ __('teacher_edit.teacher_name_ar') }}
                                    <input type="text" name="name_ar"
                                           value="{{ old('name_ar') ?: $teacher->getTranslation('name','ar') }}"
                                           class="form-control border mt-1">
                                </label>
                            </div>
                            <div class="col">
                                <label class="w-100">
                                    {{ __('teacher_edit.teacher_name_en') }}
                                    <input type="text" name="name_en"
                                           value="{{ old('name_en') ?: $teacher->getTranslation('name','en') }}"
                                           class="form-control border mt-1 ">
                                </label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label class="w-100">
                                    {{ __('teacher_edit.teacher_specialization') }}
                                    <select name="specialization_id" class="custom-select mt-1">
                                        <option value="">{{ __('teacher_edit.teacher_specialization') }}</option>
                                        @foreach($specializations as $specialization)
                                            <option
                                                value="{{ $specialization->id }}" @selected($specialization->id == old('specialization_id'))  @selected($specialization->id == $teacher->specialization_id)>{{ $specialization->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="col">
                                <label class="w-100">
                                    {{ __('teacher_edit.teacher_gender') }}
                                    <select name="gender_id" class="custom-select mt-1">
                                        <option value="">{{ __('teacher_edit.teacher_gender') }}</option>
                                        @foreach($genders as $gender)
                                            <option
                                                value="{{ $gender->id }}" @selected($gender->id == old('gender_id')) @selected($gender->id == $teacher->gender_id)>{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label class="w-100">
                                    {{ __('teacher_edit.teacher_join_date') }}
                                    <input type="date" name="join_date"
                                           value="{{ old('join_date') ?: $teacher->join_date->format('Y-m-d') }}"
                                           class="form-control border mt-1 ">
                                </label>
                            </div>
                            <div class="col">
                                <label class="w-100">
                                    {{ __('teacher_edit.teacher_address') }}
                                    <textarea name="address"
                                              class="form-control border mt-1">{{ old('address') ?: $teacher->address }}</textarea>
                                </label>
                            </div>
                        </div>
                        <div class="row p-3">
                            <button type="submit"
                                    class="btn btn-primary btn-block mt-4">{{ __('teacher_edit.add_teacher') }}</button>
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
