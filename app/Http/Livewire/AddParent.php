<?php

namespace App\Http\Livewire;

use App\Models\Blood_type;
use App\Models\Grade;
use App\Models\Nationality;
use App\Models\ParentAttachment;
use App\Models\Religion;
use App\Models\StudentParent;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddParent extends Component
{
    use WithFileUploads;

    public $currentStep = 1,

        // Father_INPUTS
        $Email, $Password,
        $Name_Father, $Name_Father_en,
        $National_ID_Father, $Passport_ID_Father,
        $Phone_Father, $Job_Father, $Job_Father_en,
        $Nationality_Father_id, $Blood_Type_Father_id,
        $Address_Father, $Religion_Father_id,

        // Mother_INPUTS
        $Name_Mother, $Name_Mother_en,
        $National_ID_Mother, $Passport_ID_Mother,
        $Phone_Mother, $Job_Mother, $Job_Mother_en,
        $Nationality_Mother_id, $Blood_Type_Mother_id,
        $Address_Mother, $Religion_Mother_id;

    public $nationalities;
    public $blood_types;
    public $religions;

    public $photos = [];


    protected $rules = [
        'Email' => 'required|email|unique:student_parents,email',
        'Password' => 'required|string|min:6|max:255',
        'Name_Father' => 'required|string|max:255',
        'Name_Father_en' => 'required|string|max:255',
        'Job_Father' => 'required|string|max:255',
        'Job_Father_en' => 'required|string|max:255',
        'National_ID_Father' => 'required||numeric|unique:student_parents,father_national_id_number',
        'Passport_ID_Father' => 'required|numeric|unique:student_parents,father_passport_number',
        'Phone_Father' => 'required|numeric|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
        'Address_Father' => 'required|string|max:255',
        'Blood_Type_Father_id' => 'required|exists:blood_types,id',
        'Religion_Father_id' => 'required|exists:religions,id',

        'Name_Mother' => 'required|string|min:5|max:255',
        'Name_Mother_en' => 'required|string|max:255',
        'Job_Mother' => 'required|string|max:255',
        'Job_Mother_en' => 'required|string|max:255',
        'National_ID_Mother' => 'required|numeric|unique:student_parents,mother_national_id_number',
        'Passport_ID_Mother' => 'required|numeric|unique:student_parents,mother_passport_number',
        'Phone_Mother' => 'required|numeric|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
        'Address_Mother' => 'required|string|max:255',
        'Blood_Type_Mother_id' => 'required|exists:blood_types,id',
        'Religion_Mother_id' => 'required|exists:religions,id',
    ];


    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function mount(): void
    {
        $this->nationalities = Nationality::all();
        $this->blood_types = Blood_type::all();
        $this->religions = Religion::all();
    }

    public function render()
    {
        return view('livewire.add-parent');
    }

    public function nextPage()
    {
        // $this->validate();
        $this->currentStep++;
    }

    public function prevPage(): void
    {
        $this->currentStep--;
    }

    public function submitForm()
    {

        $this->validate();
        $last_parent = StudentParent::create([
            'email' => $this->Email,
            'password' => bcrypt($this->Password),

            'father_name' => (['ar' => $this->Name_Father, 'en' => $this->Name_Father_en]),
            'father_national_id_number' => $this->National_ID_Father,
            'father_passport_number' => $this->Passport_ID_Father,
            'father_phone' => $this->Phone_Father,
            'father_job' => (['ar' => $this->Job_Father, 'en' => $this->Job_Father_en]),
            'father_address' => $this->Address_Father,
            'father_nationality_id' => $this->Nationality_Father_id,
            'father_blood_type_id' => $this->Blood_Type_Father_id,
            'father_religion_id' => $this->Religion_Father_id,

            'mother_name' => (['ar' => $this->Name_Mother, 'en' => $this->Name_Mother_en]),
            'mother_national_id_number' => $this->National_ID_Mother,
            'mother_passport_number' => $this->Passport_ID_Mother,
            'mother_phone' => $this->Phone_Mother,
            'mother_job' => (['ar' => $this->Job_Mother, 'en' => $this->Job_Mother_en]),
            'mother_address' =>  $this->Address_Mother,
            'mother_nationality_id' => $this->Nationality_Mother_id,
            'mother_blood_type_id' => $this->Blood_Type_Mother_id,
            'mother_religion_id' => $this->Religion_Mother_id,
        ]);



        foreach ($this->photos as $photo) {
            $photo->storeAs($this->National_ID_Father, $photo->getClientOriginalName(), 'ParentAttachments');
            $last_parent->images()->create(['url' => $photo->getClientOriginalName()]);
        }

        session()->flash('successMessage', __('parents_add.Added_parent'));

        $this->resetExcept('nationalities', 'blood_types', 'religions');

        $this->currentStep = 1;
    }
}
/*


 */
