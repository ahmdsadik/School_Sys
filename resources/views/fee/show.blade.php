@extends('layouts.master')
@section('css')

@endsection

@section('title')
    {{ $fee->title }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ $fee->title }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('/')}}"
                                                   class="default-color">{{ __('grades_list.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ $fee->title }}</li>
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
                    <div class="table-responsive ">
                        <table id="datatable" class="table table-hover table-bordered p-0">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">{{ __('fees.fee_name') }}</th>
                                <th class="text-center">{{ __('fees.fee_amount') }}</th>
                                <th class="text-center">{{ __('fees.fee_grade') }}</th>
                                <th class="text-center">{{ __('fees.fee_classroom') }}</th>
                                <th class="text-center">{{ __('fees.fee_year') }}</th>
                                <th class="text-center">{{ __('fees.fee_description') }}</th>
                                <th class="text-center">{{ __('fees.fee_action') }}</th>
                            </thead>
                            <tbody>
                            @forelse($students as $student)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->grade->name }}</td>
                                    <td>{{ $student->classroom->name }}</td>
                                    <td>{{ $student->section->name }}</td>
                                    <td>{{ $student->academic_year }}</td>
                                    <td>
                                        <a href="{{ route('/') }}"
                                           class="btn btn-info btn-sm">Show</a>
                                        {{--                                        <form action="{{ route('/') }}" class="d-none"--}}
                                        {{--                                              id="delete" method="post">--}}
                                        {{--                                            @csrf--}}
                                        {{--                                            @method('DELETE')--}}
                                        {{--                                        </form>--}}
                                        {{--                                        <button type="submit" form="delete" class="btn btn-danger btn-sm"><i--}}
                                        {{--                                                class="fa fa-trash"></i></button>--}}
                                        <a href="{{ route('/') }}"
                                           class="btn btn-info btn-sm">Pay</a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="8">{{ __('fees.no_date_found') }}</td>
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
