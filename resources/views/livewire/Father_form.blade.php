@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Email')}}</label>
                        <input type="email" wire:model.lazy="Email" class="form-control">
                        @error('Email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Password')}}</label>
                        <input type="password" wire:model.lazy="Password" class="form-control">
                        @error('Password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Name_Father')}}</label>
                        <input type="text" wire:model.lazy="Name_Father" class="form-control">
                        @error('Name_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Name_Father_en')}}</label>
                        <input type="text" wire:model.lazy="Name_Father_en" class="form-control">
                        @error('Name_Father_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title">{{trans('Parent_trans.Job_Father')}}</label>
                        <input type="text" wire:model.lazy="Job_Father" class="form-control">
                        @error('Job_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="title">{{trans('Parent_trans.Job_Father_en')}}</label>
                        <input type="text" wire:model.lazy="Job_Father_en" class="form-control">
                        @error('Job_Father_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('Parent_trans.National_ID_Father')}}</label>
                        <input type="text" wire:model.lazy="National_ID_Father" class="form-control">
                        @error('National_ID_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Passport_ID_Father')}}</label>
                        <input type="text" wire:model.lazy="Passport_ID_Father" class="form-control">
                        @error('Passport_ID_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Phone_Father')}}</label>
                        <input type="text" wire:model.lazy="Phone_Father" class="form-control">
                        @error('Phone_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>{{trans('Parent_trans.Nationality_Father_id')}}
                            <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Father_id">
                                <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                @foreach($nationalities as $nationality)
                                    <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                                @endforeach
                            </select>
                        </label>
                        @error('Nationality_Father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label>{{trans('Parent_trans.Blood_Type_Father_id')}}
                            <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Type_Father_id">
                                <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                @foreach($blood_types as $blood_type)
                                    <option value="{{$blood_type->id}}">{{$blood_type->type}}</option>
                                @endforeach
                            </select>
                        </label>
                        @error('Blood_Type_Father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label>{{trans('Parent_trans.Religion_Father_id')}}
                            <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Father_id">
                                <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                @foreach($religions as $religion)
                                    <option value="{{$religion->id}}">{{$religion->name}}</option>
                                @endforeach
                            </select>
                        </label>
                        @error('Religion_Father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{trans('Parent_trans.Address_Father')}}</label>
                    <textarea class="form-control" wire:model="Address_Father" id="exampleFormControlTextarea1"
                              rows="4"></textarea>
                    @error('Address_Father')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="nextPage"
                        type="button">{{trans('Parent_trans.Next')}}
                </button>


            </div>
        </div>
    </div>