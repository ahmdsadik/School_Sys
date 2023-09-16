@extends('layouts.master')
@section('css')

@endsection

@section('title')
    {{ __('parents.title_page') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ __('parents.title_page') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}"
                                                   class="default-color">{{ __('parents.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('parents.title_page') }}</li>
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
                <div class="col-sm-6 col-md-4 col-xl-3 mr-auto p-3">
                    <a class=" btn btn-success" href="{{ route('parents.create') }}">{{ __('parents.add_parent') }}</a>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="datatable" class="table table-hover table-bordered p-0">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">{{ __('parents.Email') }}</th>
                                    <th class="text-center">{{ __('parents.father_name') }}</th>
                                    <th class="text-center">{{ __('parents.father_nationality') }}</th>
                                    <th class="text-center">{{ __('parents.father_religion') }}</th>
                                    <th class="text-center">{{ __('parents.father_blood_type') }}</th>
                                    <th class="text-center">{{ __('parents.father_phone') }}</th>
                                    <th class="text-center">{{ __('parents.Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($parents as $parent)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $parent->email }}</td>
                                        <td>{{ $parent->father_name }}</td>
                                        <td>{{ $parent->fatherNationality->name }}</td>
                                        <td>{{ $parent->fatherReligion->name }}</td>
                                        <td>{{ $parent->fatherBloodType->type }}</td>
                                        <td>{{ $parent->father_phone }}</td>
                                        <td>
                                            <button class="btn btn-info">{{ __('parents.edit') }}</button>
                                            <button class="btn btn-danger">{{ __('parents.delete') }}</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="8">{{ __('parents.no_data_found') }}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
