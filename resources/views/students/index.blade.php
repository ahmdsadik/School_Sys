@extends('layouts.master')
@section('css')

@endsection

@section('title')
    {{ __('students.page_title') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ __('students.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('/')}}"
                                                   class="default-color">{{ __('teachers.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('students.page_title') }}</li>
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
                <div class="col-sm-6 col-md-4 col-xl-3 mr-auto p-3">
                    <a class="modal-effect btn btn-success text-light rounded-1 px-2 py-3"
                       href="{{ route('students.create') }}">{{ __('students.add_student') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table id="datatable" class="table table-hover table-bordered p-0">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">{{ __('students.student_name') }}</th>
                                <th class="text-center">{{ __('students.student_email') }}</th>
                                <th class="text-center">{{ __('students.student_blood_type') }}</th>
                                <th class="text-center">{{ __('students.student_nationality') }}</th>
                                <th class="text-center">{{ __('students.student_date_of_birth') }}</th>
                                <th class="text-center">{{ __('students.student_grade') }}</th>
                                <th class="text-center">{{ __('students.student_classroom') }}</th>
                                <th class="text-center">{{ __('students.student_section') }}</th>
                                <th class="text-center">{{ __('students.Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($students as $student)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->bloodType->type }}</td>
                                    <td>{{ $student->nationality->name }}</td>
                                    <td>{{ $student->date_birth->format('Y-m-d') }}</td>
                                    <td>{{ $student->grade->name }}</td>
                                    <td>{{ $student->classroom->name }}</td>
                                    <td>{{ $student->section->name }}</td>
                                    <td>
                                        <a href="{{ route('students.edit', $student->id) }}"
                                           class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('students.destroy',$student->id) }}" class="d-none"
                                              id="delete" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="submit" form="delete" class="btn btn-danger btn-sm"><i
                                                class="fa fa-trash"></i></button>
                                        <a href="{{ route('students.show', $student->id) }}"
                                           class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="10">{{ __('students.no_data_found') }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
