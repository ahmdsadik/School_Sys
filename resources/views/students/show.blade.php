@extends('layouts.master')
@section('css')

@endsection

@section('title')
    {{ __('student_show.page_title') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 ">
                <div class="d-flex align-items-center">
                    <h4 class="mb-0">{{ __('student_show.page_title') }}</h4>
                    <h5>"{{ $student->name }}"</h5>
                </div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('/')}}"
                                                   class="default-color">{{ __('grades_list.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('student_show.page_title') }}</li>
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
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_email') }}
                                <input disabled type="email" value="{{ $student->email }}"
                                       class="form-control border mt-1 ">
                            </label>
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_password') }}
                                <input disabled type="password" value="{{ $student->password }}"
                                       class="form-control border mt-1 ">
                            </label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_name_ar') }}
                                <input disabled type="text" value="{{ $student->getTranslation('name','ar') }}"
                                       class="form-control border mt-1 ">
                            </label>
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_name_en') }}
                                <input disabled type="text" value="{{ $student->getTranslation('name','en') }}"
                                       class="form-control border mt-1 ">
                            </label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_gender') }}
                                <input disabled type="text" value="{{ $student->gender->name }}"
                                       class="form-control border mt-1 ">

                            </label>
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_nationality') }}
                                <input disabled type="text" value="{{ $student->nationality->name }}"
                                       class="form-control border mt-1 ">
                            </label>
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_blood_type') }}
                                <input disabled type="text" value="{{ $student->bloodType->type }}"
                                       class="form-control border mt-1 ">
                            </label>
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_date_of_birth') }}
                                <input disabled type="date" value="{{ $student->date_birth->format('Y-m-d') }}"
                                       class="form-control border mt-1 ">
                            </label>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_grade') }}
                                <input disabled type="text" value="{{ $student->grade->name }}"
                                       class="form-control border mt-1 ">
                            </label>
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_classroom') }}
                                <input disabled type="text" value="{{ $student->classroom->name }}"
                                       class="form-control border mt-1 ">
                            </label>
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_section') }}
                                <input disabled type="text" value="{{ $student->section->name }}"
                                       class="form-control border mt-1 ">
                            </label>
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.parent_id') }}
                                <input disabled type="text" value="{{ $student->parent->father_name }}"
                                       class="form-control border mt-1 ">
                            </label>
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.academic_year') }}
                                <input disabled type="text" value="{{ $student->academic_year }}"
                                       class="form-control border mt-1 ">
                            </label>
                        </div>
                    </div>
                    <div class="row mt-3 pl-3">
                        <label class="">
                            <h5 class="d-block">
                                {{ __('student_show.student_attachment') }}
                            </h5>
                            <div class="mt-2 d-flex">

                                @forelse($student->images as $img)
                                    <div class="border pb-2 shadow-lg">
                                        <div>
                                            <img width="300" height="300"
                                                 src="{{ route('attachments.show', ['filename' => "StudentAttachments/$student->id/$img->url"]) }}"
                                                 alt="Attachment">
                                        </div>
                                        <div class="mt-2 d-flex justify-content-center align-items-center">
                                            <a href="{{ route('students.show-attachment', [$student->id , $img->url]) }}"
                                               class="btn btn-info text-light rounded-0"
                                               target="_blank"
                                            >{{ __('student_show.show_img') }}</a>
                                            <a href="{{ route('students.download-attachment',[$student->id , $img->url]) }}"
                                               class="btn btn-success text-light rounded-0 mx-2">{{ __('student_show.download_img') }}</a>
                                            <a href="{{ route('students.delete-attachment',$img->id) }}"
                                               class="btn btn-danger text-light rounded-0">{{ __('student_show.delete_img') }}</a>

                                        </div>
                                    </div>
                                @empty
                                    <div class="">{{ __('student_show.no_attachments') }}</div>
                                @endforelse


                            </div>
                        </label>

                    </div>

                    <div class="row">
                        {{--                        @if (!@empty($photos))--}}
                        {{--                            @foreach($photos as $photo)--}}
                        {{--                                <div>--}}
                        {{--                                    <img width="200px" height="200px" src="{{ $photo->temporaryUrl() }}" alt="">--}}
                        {{--                                </div>--}}
                        {{--                            @endforeach--}}
                        {{--                        @endif--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
