@extends('layouts.master')

@section('title')
    {{ __('classroom_list.title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ __('classroom_list.title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}"
                                                   class="default-color">{{ __('classroom_list.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('classroom_list.title') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <span>{{ $error }}</span>
            </div>
        @endforeach
    @endif
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics">
                <div class="col-sm-6 col-md-4 col-xl-3 mr-auto p-3">
                    <a class="modal-effect btn btn-success rounded-1 px-2 py-3" data-effect="effect-scale"
                       data-toggle="modal" href="#add-modal">{{ __('classroom_list.add_classroom') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table id="datatable" class="table table-hover table-bordered p-0">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">{{ __('classroom_list.classroom_name') }}</th>
                                <th class="text-center">{{ __('classroom_list.grade_name') }}</th>
                                <th class="text-center">{{ __('classroom_list.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($classrooms as $classroom)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $classroom->name }}</td>
                                    <td>{{ $classroom->grade->name }}</td>
                                    <td>
                                        <a class="modal-effect btn btn-outline-info btn-sm" data-effect="effect-scale"
                                           id="edit-btn" data-toggle="modal" href="#edit-modal"
                                           title="{{ __('classroom_list.edit') }}"
                                           data-classroom-name-ar="{{ $classroom->getTranslation('name', 'ar') }}"
                                           data-classroom-name-en="{{ $classroom->getTranslation('name', 'en') }}"
                                           data-id="{{ $classroom->id }}"
                                           data-grade-id="{{ $classroom->grade->id }}"
                                        >
                                            <i class="fa fa-edit"></i></a>
                                        <a class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale"
                                           data-toggle="modal" href="#delete-modal" id="delete-btn"
                                           data-id="{{ $classroom->id }}"
                                           data-grade-delete-alert="{{ __('classroom_list.delete_classroom', ['class' => $classroom->name]) }}"
                                           title="{{ __('classroom_list.delete') }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="4">{{ __('classroom_list.empty') }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- For Add  -->
        <div class="modal fade" id="add-modal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ __('classroom_list.add_classroom_title') }}</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('classrooms.store') }}" method="post" id='new-sec'>
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="classroom-ar"
                                       class="col-form-label">{{ __('classroom_list.classroom_name_ar') }}</label>
                                <input type="text"
                                       class="form-control border @error('classroom_ar') is-invalid @enderror"
                                       value="{{ old('classroom_ar') }}" name="classroom_ar" id="classroom-ar">
                            </div>
                            <div class="mb-3">
                                <label for="classroom-en"
                                       class="col-form-label">{{ __('classroom_list.classroom_name_ar') }}</label>
                                <input type="text"
                                       class="form-control border @error('classroom_en') is-invalid @enderror"
                                       value="{{ old('classroom_en') }}" name="classroom_en" id="classroom-en">
                            </div>
                            <div class="mb-3">
                                <label for="grade_id" class="form-label">{{ __('classroom_list.grade') }}</label>
                                <select name="grade_id" id="grade_id" class="custom-select">
                                    <option value="" selected disabled>{{ __('classroom_list.select_grade') }}
                                    </option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary"
                                    type="submit">{{ __('classroom_list.submit') }}</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal"
                                    type="button">{{ __('classroom_list.close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Add modal -->
        <!-- For Edit  -->
        <div class="modal fade" id="edit-modal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ __('classroom_list.edit_grade') }}</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ url('classrooms/update') }}" method="post" id='new-sec'>
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="classroom-ar"
                                       class="col-form-label">{{ __('classroom_list.classroom_name_ar') }}</label>
                                <input type="text"
                                       class="form-control border @error('classroom_ar') is-invalid @enderror"
                                       value="{{ old('classroom_ar') }}" name="classroom_ar" id="classroom-ar">
                            </div>
                            <div class="mb-3">
                                <label for="classroom-en"
                                       class="col-form-label">{{ __('classroom_list.classroom_name_ar') }}</label>
                                <input type="text"
                                       class="form-control border @error('classroom_en') is-invalid @enderror"
                                       value="{{ old('classroom_en') }}" name="classroom_en" id="classroom-en">
                            </div>
                            <div class="mb-3">
                                <label for="grade_id" class="col-form-label">{{ __('classroom_list.grade') }}</label>
                                <select name="grade_id" id="grade_id" class="custom-select">
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary"
                                    type="submit">{{ __('classroom_list.edit') }}</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal"
                                    type="button">{{ __('classroom_list.close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Edit modal -->
        <!-- For Delete  -->
        <div class="modal fade" id="delete-modal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ __('classroom_list.delete_grade') }}</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('classrooms.destroy', ['test']) }}" method="post" id='new-sec'>
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p id="delete-message"></p>
                            <input type="hidden" name="id" id="id">
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-danger"
                                    type="submit">{{ __('classroom_list.delete') }}</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal"
                                    type="button">{{ __('classroom_list.close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Delete modal -->
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        @if (Session::has('message'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.{{ session('message')['type'] }}("{{ session('message')['text'] }}");
        @endif
    </script>

    <script>
        $(document).on('click', '#delete-btn', function () {
            var id = $(this).attr('data-id');
            var grade_delete = $(this).data('grade-delete-alert');
            $('#delete-modal #delete-message').html(grade_delete);
            $('#delete-modal #id').val(id);
        });
    </script>

    <script>
        $(document).on('click', '#edit-btn', function () {
            var classroom_name_ar = $(this).data('classroom-name-ar');
            var classroom_name_en = $(this).data('classroom-name-en');
            var id = $(this).data('id');
            var grade_id = $(this).data('grade-id');
            $('#edit-modal #classroom-ar').val(classroom_name_ar);
            $('#edit-modal #classroom-en').val(classroom_name_en);
            $('#edit-modal #id').val(id);
            $('#edit-modal select[name="grade_id"] option').each(function () {
                if ($(this).val() == grade_id) {
                    $(this).attr('selected', '');
                }
            });
        });
    </script>
@endsection
