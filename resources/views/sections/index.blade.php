@extends('layouts.master')

@section('title')
    {{ __('section_list.title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ __('section_list.title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}"
                                                   class="default-color">{{ __('section_list.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('section_list.title') }}</li>
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
                    <a class="modal-effect btn btn-success x-small " data-effect="effect-scale" data-toggle="modal"
                       href="#add-modal">{{ __('section_list.add_section') }}</a>
                </div>
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
                                                        <a class="modal-effect btn btn-outline-info btn-sm"
                                                           data-effect="effect-scale" id="edit-btn"
                                                           data-toggle="modal" href="#edit-modal"
                                                           title="{{ __('grades_list.edit') }}"
                                                           data-section_name_ar="{{ $section->getTranslation('name', 'ar') }}"
                                                           data-section_name_en="{{ $section->getTranslation('name', 'en') }}"
                                                           data-id="{{ $section->id }}"
                                                           data-grade_id="{{ $grade->id }}"
                                                           data-classroom_id="{{ $section->classroom->id }}"
                                                           data-status="{{ $section->getStatusVal() }}"
                                                           data-teacher_id="{{ implode(',', $section->teachers->pluck('id')->toArray()) }}"
                                                        >
                                                            <i class="fa fa-edit"></i></a>
                                                        <a class="modal-effect btn btn-outline-danger btn-sm"
                                                           data-effect="effect-scale" data-toggle="modal"
                                                           href="#delete-modal" id="delete-btn"
                                                           data-id="{{ $section->id }}"
                                                           data-grade-delete-alert="{{ __('section_list.delete_section', ['section' => $section->name]) }}"
                                                           title="{{ __('grades_list.delete') }}"><i
                                                                class="fa fa-trash"></i></a>
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

        <!-- For Add  -->
        <div class="modal fade" id="add-modal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ __('section_list.add_section_title') }}</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('sections.store') }}" method="post" id='new-sec'>
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col ">
                                    <label for="section-name-ar"
                                           class="col-form-label ">{{ __('section_list.section_name_ar') }}</label>
                                    <input type="text"
                                           class="border form-control @error('section_name_ar') is-invalid @enderror"
                                           value="{{ old('section_name_ar') }}" name="section_name_ar"
                                           id="section-name-ar">
                                </div>
                                <div class="col ">
                                    <label for="section-name-en"
                                           class="col-form-label ">{{ __('section_list.section_name_en') }}</label>
                                    <input type="text"
                                           class="border form-control @error('section_name_en') is-invalid @enderror"
                                           value="{{ old('section_name_en') }}" name="section_name_en"
                                           id="section-name-en">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="grades" class="col-form-label">{{ __('section_list.grade') }}</label>
                                <select id="grades" name="grade_id" class="custom-select">
                                    <option value="">{{ __('section_list.select_grade') }}</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="classroom"
                                       class="col-form-label">{{ __('section_list.classrooms') }}</label>
                                <select id="classroom" name="classroom_id" class="custom-select">
                                    <option value="">{{ __('section_list.select_classroom') }}</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="teacher"
                                       class="col-form-label">{{ __('section_list.select_teacher') }}</label>
                                <select id="teacher" name="teacher_id[]" class="custom-select" multiple>
                                    <option value="">{{ __('section_list.select_teacher') }}</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary"
                                    type="submit">{{ __('section_list.submit') }}</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal"
                                    type="button">{{ __('section_list.close') }}</button>
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
                        <h6 class="modal-title">{{ __('section_list.edit_section_title') }}</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ url('sections/update') }}" method="post" id='new-sec'>
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col ">
                                    <label for="section-name-ar"
                                           class="col-form-label ">{{ __('section_list.section_name_ar') }}</label>
                                    <input type="text"
                                           class="border form-control @error('section_name_ar') is-invalid @enderror"
                                           value="{{ old('section_name_ar') }}" name="section_name_ar"
                                           id="section-name-ar">
                                </div>
                                <div class="col ">
                                    <label for="section-name-en"
                                           class="col-form-label ">{{ __('section_list.section_name_en') }}</label>
                                    <input type="text"
                                           class="border form-control @error('section_name_en') is-invalid @enderror"
                                           value="{{ old('section_name_en') }}" name="section_name_en"
                                           id="section-name-en">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="grades" class="col-form-label">{{ __('section_list.grade') }}</label>
                                <select id="grades" name="grade_id" class="custom-select">
                                    <option value="">{{ __('section_list.select_grade') }}</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="classroom"
                                       class="col-form-label">{{ __('section_list.classrooms') }}</label>
                                <select id="classroom" name="classroom_id" class="custom-select">
                                    <option value="">{{ __('section_list.select_classroom') }}</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="teacher_id"
                                       class="col-form-label">{{ __('section_list.select_teacher') }}</label>
                                <select id="teacher_id" name="teacher_id[]" class="custom-select" multiple>
                                    <option value="">{{ __('section_list.select_teacher') }}</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="col-form-label">{{ __('section_list.status') }}</label>
                                <input type="checkbox" name="status" class="custom-checkbox rounded-0" id="status">
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
                        <h6 class="modal-title">{{ __('section_list.delete_section_title') }}</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('sections.destroy', ['test']) }}" method="post" id='new-sec'>
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
        $(document).ready(function () {
            $('#add-modal #grades').on('change', function () {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax({
                        url: "{{ url('allClassrooms') }}/" + grade_id,
                        method: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('#add-modal #classroom').empty();
                            $.each(data, function (key, value) {

                                $('#add-modal #classroom').append('<option value="' +
                                    value.id + '">' + value.name
                                        .{{ app()->getLocale() }} + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('No Grade Id Selected');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#edit-modal #grades').on('change', function () {
                var grade_id = $(this).val();
                var classroom_id = $('#edit-btn').attr('data-classroom_id');

                if (grade_id) {
                    $.ajax({
                        url: "{{ url('allClassrooms') }}/" + grade_id,
                        method: "GET",
                        dataType: "json",
                        success: function (data) {

                            $(' #edit-modal #classroom').empty();
                            $.each(data, function (key, value) {
                                // console.log(`value.id = ${value.id} and classroom_id = ${classroom_id} => ${(classroom_id == value.id)} `);
                                {{-- $(' #edit-modal #classroom').append('<option value="' + value.id + '">' + value.name.{{ app()->getLocale() }} + '</option>'); --}}
                                $(' #edit-modal #classroom').append(
                                    `<option value="${value.id}"${(classroom_id == value.id) ? "selected" : ""} > ${value.name.{{ app()->getLocale() }}}</option>`
                                );
                            });
                        },
                    });
                } else {
                    console.log('No Grade Id Selected');
                }


            })
        })
    </script>

    <script>
        $(document).on('click', '#edit-btn', function () {

            var id = $(this).attr('data-id');
            var section_name_ar = $(this).attr('data-section_name_ar');
            var section_name_en = $(this).attr('data-section_name_en');
            var grade_id = $(this).attr('data-grade_id');
            var classroom_id = $(this).attr('data-classroom_id');
            var status = $(this).attr('data-status');
            var teacher_id = $(this).attr('data-teacher_id');

            $('#edit-modal #id').val(id);
            $('#edit-modal #section-name-ar').val(section_name_ar);
            $('#edit-modal #section-name-en').val(section_name_en);
            // Check if status == 1 make checkbox checked else unchecked
            if (status == 1) {
                $('#edit-modal #status').attr('checked', 'checked');
            } else {
                $('#edit-modal #status').attr('checked', false);
            }

            // Remove old selected grade
            $('#edit-modal #grades option').attr('selected', false);
            // Set new selected grade
            $('#edit-modal #grades option').each(function () {
                if ($(this).val() == grade_id) {
                    $(this).attr('selected', 'selected');
                }
            });

            if (grade_id) {
                $.ajax({
                    url: "{{ url('allClassrooms') }}/" + grade_id,
                    method: "GET",
                    dataType: "json",
                    success: function (data) {

                        $(' #edit-modal #classroom').empty();
                        $.each(data, function (key, value) {
                            $(' #edit-modal #classroom').append(
                                `<option value="${value.id}"${(classroom_id == value.id) ? "selected" : ""} > ${value.name.{{ app()->getLocale() }}}</option>`
                            );
                        });
                    },
                });
            } else {
                console.log('No Grade Id Selected');
            }

            let ops = $('#edit-modal #teacher_id option');
            ops.each(function (key2, value) {
                if (teacher_id.split(',').includes($(value).val())) {
                    $(value).attr('selected', 'selected');
                }
            });

        });
    </script>

    <script>
        $(document).on('click', '#delete-btn', function () {
            var id = $(this).attr('data-id');
            var grade_delete = $(this).data('grade-delete-alert');
            $('#delete-modal #delete-message').html(grade_delete);
            $('#delete-modal #id').val(id);
        });
    </script>
@endsection
