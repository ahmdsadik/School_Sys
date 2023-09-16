@extends('layouts.master')
@section('css')

@endsection

@section('title')
    {{ __('fees.page_title') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ __('fees.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('/')}}"
                                                   class="default-color">{{ __('teachers.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('fees.page_title') }}</li>
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
                    <a class="modal-effect btn btn-success text-light rounded-1 px-2 py-2"
                       href="{{ route('fees.create') }}">{{ __('fees.add_fee') }}</a>
                </div>
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
                            @forelse($fees as $fee)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $fee->title }}</td>
                                    <td>{{ $fee->amount }}</td>
                                    <td>{{ $fee->grade->name }}</td>
                                    <td>{{ $fee->classroom->name }}</td>
                                    <td>{{ $fee->year }}</td>
                                    <td>{{ $fee->description }}</td>
                                    <td>
                                        <a href="{{ route('fees.edit', $fee->id) }}"
                                           class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('fees.destroy',$fee->id) }}" class="d-none"
                                              id="delete" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="submit" form="delete" class="btn btn-danger btn-sm"><i
                                                class="fa fa-trash"></i></button>
                                        <a href="{{ route('fees.show', $fee->id) }}"
                                           class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
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
