<div>

        <form wire:submit.prevent="submit">
            <div class="mb-3 row">
                <div class="col">
                    <label class="form-label w-100"> {{ __('fee_add.name_ar') }}
                        <input type="text"  wire:model.lazy="name_ar"
                               class="form-control border ">
                    </label>
                    @error('name_ar')
                    <div class="alert alert-danger" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label w-100"> {{ __('fee_add.name_en') }}
                        <input type="text" wire:model.lazy="name_en"
                               class="form-control border ">
                    </label>
                    @error('name_en')
                    <div class="alert alert-danger" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label w-100"> {{ __('fee_add.amount') }}
                        <input type="number" wire:model="fee.amount"
                               step="100" min="0" class="form-control border ">
                    </label>
                    @error('fee.amount')
                    <div class="alert alert-danger" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col">
                    <label class="form-label w-100"> {{ __('fee_add.grade') }}
                        <select wire:model="fee.grade_id" class="custom-select">
                            <option value="">{{ __('fee_add.grade') }}</option>
                            @foreach ($grades as $grade)
                                <option
                                    @selected($fee->grade_id == $grade->id) value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </label>
                    @error('fee.grade_id')
                    <div class="alert alert-danger" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label w-100"> {{ __('fee_add.classroom') }}
                        <select wire:model="fee.classroom_id" class="custom-select">
                            <option value="">{{ __('fee_add.classroom') }}</option>
                            @foreach ($classrooms as $classroom)
                                <option
                                    @selected($fee->classroom_id == $classroom->id) value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                            @endforeach
                        </select>
                    </label>
                    @error('fee.classroom_id')
                    <div class="alert alert-danger" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label w-100"> {{ __('fee_add.year') }}
                        <select wire:model="fee.year" class="custom-select">
                            <option value="">{{ __('fee_add.year') }}</option>
                            @foreach ($years as $y)
                                <option @selected($fee->year == $y) value="{{ $y }}">{{ $y }}</option>
                            @endforeach
                        </select>
                    </label>
                    @error('fee.year')
                    <div class="alert alert-danger" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row px-3">
                <label class="w-100">{{ __('fee_add.description') }}
                    <textarea class="form-control border rounded-0" wire:model="fee.description"></textarea>
                </label>
                @error('fee.description')
                <div class="alert alert-danger" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block rounded-0">{{ __('fee_edit.submit') }}</button>
        </form>

</div>