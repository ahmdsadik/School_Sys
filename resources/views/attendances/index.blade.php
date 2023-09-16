@extends('layouts.master')
@section('css')

@endsection

@section('title')
    {{ __('attendance.page_title') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ __('attendance.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('/')}}"
                                                   class="default-color">{{ __('grades_list.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('attendance.page_title') }}</li>
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
                    <div class="accordion gray plus-icon round">
                        @forelse($grades as $grade)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{ $grade->name }}</a>
                                <div class="acd-des">
                                    <div class="table-responsive ">
                                        <table id="datatable" class="table table-hover table-bordered p-0">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">{{ __('section_list.section_name') }}</th>
                                                <th class="text-center">{{ __('section_list.classrooms') }}</th>
                                                <th class="text-center">{{ __('section_list.status') }}</th>
                                                <th class="text-center">{{ __('grades_list.action') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($grade->sections as $section)
                                                <tr class="text-center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $section->name }}</td>
                                                    <td>{{ $section->classroom->name }}</td>
                                                    <td>{{ $section->status }}</td>
                                                    <td>
                                                        <a href="{{ route('attendances.show',$section) }}"
                                                           class="btn btn-outline-info">{{ __('attendance.add_attendance') }}</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center">
                                                    <td colspan="4">{{ __('section_list.empty') }}</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        @empty
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
