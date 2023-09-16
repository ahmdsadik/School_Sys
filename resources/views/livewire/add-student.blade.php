<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics ">
            <div class="card-body">
                <form wire:submit.prevent="submit">
                    <div class="row">
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_email') }}
                                <input type="email" wire:model="email" class="form-control border mt-1 ">
                            </label>
                            @error('email')
                            <div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_password') }}
                                <input type="password" wire:model="password" class="form-control border mt-1 ">
                            </label>
                            @error('password')
                            <div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_name_ar') }}
                                <input type="text" wire:model="name_ar" class="form-control border mt-1 ">
                            </label>
                            @error('name_ar')
                            <div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_name_en') }}
                                <input type="text" wire:model="name_en" class="form-control border mt-1 ">
                            </label>
                            @error('name_en')
                            <div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_gender') }}
                                <select wire:model="gender_id" class="custom-select mt-1">
                                    <option value="">{{ __('student_add.student_gender') }}</option>
                                    @foreach($genders as $gender)
                                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                            @error('gender_id')
                            <div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_nationality') }}
                                <select wire:model="nationality_id" class="custom-select mt-1">
                                    <option value="">{{ __('student_add.student_nationality') }}</option>
                                    @foreach($nationalities as $nationality)
                                        <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                            @error('nationality_id')
                            <div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_blood_type') }}
                                <select wire:model="blood_type_id" class="custom-select mt-1">
                                    <option value="">{{ __('student_add.student_blood_type') }}</option>
                                    @foreach($blood_types as $blood_type)
                                        <option value="{{ $blood_type->id }}">{{ $blood_type->type }}</option>
                                    @endforeach
                                </select>
                            </label>
                            @error('blood_type_id')
                            <div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_date_of_birth') }}
                                <input type="date" wire:model="date_of_birth" class="form-control border mt-1 ">
                            </label>
                            @error('date_of_birth')
                            <div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_grade') }}
                                <select wire:model="grade_id" class="custom-select mt-1">
                                    <option value="">{{ __('student_add.student_grade') }}</option>
                                    @foreach($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                            @error('grade_id')
                            <div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_classroom') }}
                                <select wire:model="classroom_id" class="custom-select mt-1">
                                    <option value="">{{ __('student_add.student_classroom') }}</option>
                                    @foreach($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                            @error('classroom_id')
                            <div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.student_section') }}
                                <select wire:model="section_id" class="custom-select mt-1">
                                    <option value="">{{ __('student_add.student_section') }}</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                            @error('section_id')
                            <div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.parent_id') }}
                                <select wire:model="parent_id" class="custom-select mt-1">
                                    <option value="">{{ __('student_add.parent_id') }}</option>
                                    @foreach($parents as $parent)
                                        <option value="{{ $parent->id }}">{{ $parent->father_name }}</option>
                                    @endforeach
                                </select>
                            </label>
                            @error('parent_id')
                            <div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="w-100">
                                {{ __('student_add.academic_year') }}
                                <select wire:model="academic_year" class="custom-select mt-1">
                                    <option value="">{{ __('student_add.academic_year') }}</option>
                                    @foreach($academic_years as $year)
                                        <option value="{{ $year }}">{{ $year}}</option>
                                    @endforeach
                                </select>
                            </label>
                            @error('academic_year')
                            <div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3 pl-3">
                        <label class="">
                            <p class="d-block">
                                Images
                            </p>
                            <input type="file" wire:model="photos" accept="image/*" multiple>
                        </label>

                    </div>

                    <div class="row">
                        @if (!@empty($photos))
                            @foreach($photos as $photo)
                                <div>
                                    <img width="200px" height="200px" src="{{ $photo->temporaryUrl() }}" alt="">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="row p-3">
                        <button type="submit" wire:loading.attr="disabled" wire:target="photos"
                                class="btn btn-primary btn-block mt-4 rounded-0 h1">{{ __('student_add.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>