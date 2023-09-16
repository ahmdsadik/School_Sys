<div>
    @if (session('successMessage'))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session('successMessage') }}
        </div>
    @endif

    {{--    @if ($catchError) --}}
    {{--        <div class="alert alert-danger" id="success-danger"> --}}
    {{--            <button type="button" class="close" data-dismiss="alert">x</button> --}}
    {{--            {{ $catchError }} --}}
    {{--        </div> --}}
    {{--    @endif --}}


    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                   class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>{{ trans('Parent_trans.Step1') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                   class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>{{ trans('Parent_trans.Step2') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button"
                   class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                   disabled="disabled">3</a>
                <p>{{ trans('Parent_trans.Step3') }}</p>
            </div>
        </div>
    </div>

    @include('livewire.Father_Form')

    @include('livewire.Mother_Form')


    @if ($currentStep == 3)
        <div class="row setup-content px-3" id="step-3">
            <div class="row setup-content" id="step-3">


                <div class="col-xs-12">
                    <div class="col-md-12"><br>
                        <label style="color: red">{{ trans('Parent_trans.Attachments') }}</label>
                        <div class="form-group">
                            <input type="file" wire:model="photos" accept="image/*" multiple>
                        </div>
                        <br>

                        <div class=" d-flex align-items-center">
                            @if ($photos)
                                @foreach($photos as $photo)
                                    <div>
                                        <img src="{{ $photo->temporaryUrl() }}" width="200" height="200" class="mb-2"
                                             alt="Image_{{ $loop->iteration }}"/>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        {{-- <input type="hidden" wire:model="Parent_id"> --}}

                        <div class="mt-3">
                            <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"

                                    wire:click="prevPage">{{ trans('Parent_trans.Back') }}</button>


                            <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                                    wire:loading.attr="disabled" wire:target="photos"
                                    type="button">{{ trans('Parent_trans.Finish') }}</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif


</div>
