@extends('layouts.master')

@section('title')
    {{ __('grades_list.title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ __('grades_list.title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}"
                            class="default-color">{{ __('grades_list.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('grades_list.title') }}</li>
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
                    <a class="modal-effect btn btn-primary " data-effect="effect-scale" data-toggle="modal"
                        href="#add-modal">{{ __('grades_list.add') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table id="datatable" class="table table-hover table-bordered p-0">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">{{ __('grades_list.grade_name') }}</th>
                                    <th class="text-center">{{ __('grades_list.notes') }}</th>
                                    <th class="text-center">{{ __('grades_list.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($grades as $grade)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $grade->name }}</td>
                                        <td>{{ $grade->notes }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-outline-info btn-sm" data-effect="effect-scale"
                                                id="edit-btn" data-toggle="modal" href="#edit-modal"
                                                title="{{ __('grades_list.edit') }}"
                                                data-grade_name_ar="{{ $grade->getTranslation('name', 'ar') }}"
                                                data-grade_name_en="{{ $grade->getTranslation('name', 'en') }}"
                                                data-notes="{{ $grade->notes }}" data-id="{{ $grade->id }}">
                                                <i class="fa fa-edit"></i></a>
                                            <a class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale"
                                                data-toggle="modal" href="#delete-modal" id="delete-btn"
                                                data-id="{{ $grade->id }}"
                                                data-grade-delete-alert="{{ __('grades_list.delete_grade_alert', ['grade' => $grade->name]) }}"
                                                title="{{ __('grades_list.delete') }}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="4">{{ __('grades_list.empty') }}</td>
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
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ __('grades_list.add') }}</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('grades.store') }}" method="post" id='new-sec'>
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="grade-name-ar"
                                    class="col-form-label">{{ __('grades_list.grade_name_ar') }}</label>
                                <input type="text" class="form-control rounded-0 border @error('grade_name_ar') is-invalid @enderror"
                                    value="{{ old('grade_name_ar') }}" name="grade_name_ar" id="grade-name-ar">
                            </div>
                            <div class="mb-3">
                                <label for="grade-name-en"
                                    class="col-form-label">{{ __('grades_list.grade_name_en') }}</label>
                                <input type="text" class="form-control rounded-0 border @error('grade_name_en') is-invalid @enderror"
                                    value="{{ old('grade_name_en') }}" name="grade_name_en" id="grade-name-en">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">{{ __('grades_list.notes') }}</label>
                                <textarea class="form-control rounded-0 border @error('notes') is-invalid @enderror" name="notes" id="message-text">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary rounded-0" type="submit">{{ __('grades_list.submit') }}</button>
                            <button class="btn ripple btn-secondary rounded-0" data-dismiss="modal"
                                type="button">{{ __('grades_list.close') }}</button>
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
                        <h6 class="modal-title">{{ __('grades_list.edit_grade') }}</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ url('grades/update') }}" method="post" id='new-sec'>
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="grade-name-ar"
                                    class="col-form-label">{{ __('grades_list.grade_name_ar') }}</label>
                                <input type="text" class="form-control @error('grade_name_ar') is-invalid @enderror"
                                    value="{{ old('grade_name_ar') }}" name="grade_name_ar" id="grade-name-ar">
                            </div>
                            <div class="mb-3">
                                <label for="grade-name-en"
                                    class="col-form-label">{{ __('grades_list.grade_name_en') }}</label>
                                <input type="text" class="form-control @error('grade_name_en') is-invalid @enderror"
                                    value="{{ old('grade_name_en') }}" name="grade_name_en" id="grade-name-en">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">{{ __('grades_list.notes') }}</label>
                                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" id="notes">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">{{ __('grades_list.edit') }}</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal"
                                type="button">{{ __('grades_list.close') }}</button>
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
                        <h6 class="modal-title">{{ __('grades_list.delete_grade') }}</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('grades.destroy', ['test']) }}" method="post" id='new-sec'>
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p id="delete-message"></p>
                            <input type="hidden" name="id" id="id">
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-danger" type="submit">{{ __('grades_list.delete') }}</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal"
                                type="button">{{ __('grades_list.close') }}</button>
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
        $(document).on('click', '#edit-btn', function() {
            var id = $(this).attr('data-id');
            var grade_name_ar = $(this).attr('data-grade_name_ar');
            var grade_name_en = $(this).attr('data-grade_name_en');
            var notes = $(this).attr('data-notes');
            $('#edit-modal #grade-name-ar').val(grade_name_ar);
            $('#edit-modal #grade-name-en').val(grade_name_en);
            // Change textarea value
            $('#edit-modal #notes').text(notes);
            // console.log(notes);

            $('#edit-modal #id').val(id);
        });
    </script>

    <script>
        $(document).on('click', '#delete-btn', function() {
            var id = $(this).attr('data-id');
            var grade_delete = $(this).attr('data-grade-delete-alert');
            $('#delete-modal #delete-message').html(grade_delete);
            $('#delete-modal #id').val(id);
        });
    </script>
@endsection
