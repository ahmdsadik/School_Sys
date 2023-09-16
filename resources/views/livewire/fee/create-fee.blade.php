<div>

    <form wire:submit.prevent="submit">
        <div class="mb-3 row">
            <div class="col">
                <label class="form-label w-100"> {{ __('fee_add.name_ar') }}
                    <input type="text" wire:model.lazy="name_ar" class="form-control border ">
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
                    <input type="text" wire:model.lazy="name_en" class="form-control border ">
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
                    <input type="number" wire:model.lazy="amount" step="100" min="0" class="form-control border ">
                </label>
                @error('amount')
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
                    <select wire:model="grade_id" class="custom-select">
                        <option value="">{{ __('fee_add.grade') }}</option>
                        @foreach ($grades as $grade)
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
                <label class="form-label w-100"> {{ __('fee_add.classroom') }}
                    <select wire:model="classroom_id" class="custom-select">
                        <option value="">{{ __('fee_add.classroom') }}</option>
                        @foreach ($classrooms as $classroom)
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
                <label class="form-label w-100"> {{ __('fee_add.year') }}
                    <select wire:model="year" class="custom-select">
                        <option value="">{{ __('fee_add.year') }}</option>
                        @foreach ($years as $y)
                            <option value="{{ $y }}">{{ $y }}</option>
                        @endforeach
                    </select>
                </label>
                @error('year')
                <div class="alert alert-danger" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row px-3">
            <label class="w-100">{{ __('fee_add.description') }}
                <textarea class="form-control border rounded-0" wire:model.defer="description"></textarea>
            </label>
            @error('description')
            <div class="alert alert-danger" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block rounded-0">{{ __('fee_add.submit') }}</button>
    </form>

</div>