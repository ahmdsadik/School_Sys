@extends('layouts.master')
@section('css')

@endsection

@section('title')
    {{ __('teachers.page_title') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ __('teachers.Teachers_list') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('/')}}"
                                                   class="default-color">{{ __('teachers.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('teachers.Teachers_list') }}</li>
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
                       href="{{ route('teachers.create') }}">{{ __('teachers.add_teacher') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table id="datatable" class="table table-hover table-bordered p-0">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">{{ __('teachers.Name') }}</th>
                                <th class="text-center">{{ __('teachers.specialization') }}</th>
                                <th class="text-center">{{ __('teachers.gender') }}</th>
                                <th class="text-center">{{ __('teachers.join_date') }}</th>
                                <th class="text-center">{{ __('teachers.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($teachers as $teacher)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->specialization->name }}</td>
                                    <td>{{ $teacher->gender->name }}</td>
                                    <td>{{ $teacher->join_date->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('teachers.edit', $teacher->id) }}"
                                           class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('teachers.destroy',$teacher->id) }}" class="d-none"
                                              id="delete" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="submit" form="delete" class="btn btn-danger btn-sm"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="6">{{ __('teachers.no_data_found') }}</td>
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
