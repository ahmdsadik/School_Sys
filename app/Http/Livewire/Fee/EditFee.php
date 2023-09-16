<?php

namespace App\Http\Livewire\Fee;

use App\Models\Fee;
use App\Models\Grade;
use Livewire\Component;

class EditFee extends Component
{

    public Fee $fee;
    public
        $name_ar,
        $name_en,

        $grades = [],
        $classrooms = [],
        $years = [];

    protected $rules =
        [
            'name_ar' => 'required|min:4',
            'name_en' => 'required|min:4',
            'fee.amount' => 'required|integer',
            'fee.grade_id' => 'required|exists:grades,id',
            'fee.classroom_id' => 'required|exists:classrooms,id',
            'fee.year' => 'required|date_format:Y',
            'fee.description' => 'string|nullable'
        ];

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function updatedFeeGradeId($value): void
    {
        $this->classrooms = $value ? Grade::find($value)->classrooms : [];
    }

    public function mount(): void
    {
        $this->name_ar = $this->fee->getTranslation('title', 'ar');
        $this->name_en = $this->fee->getTranslation('title', 'en');
        $this->grades = Grade::all();
        $this->classrooms = $this->fee->grade_id ? Grade::find($this->fee->grade_id)->classrooms : [];
        $this->years = range(date('Y'), date('Y', strtotime('+1 years')));

    }

    public function render()
    {
        return view('livewire.fee.edit-fee');
    }

    public function submit()
    {
        $this->validate();

        $this->fee->title = ['ar' => $this->name_ar, 'en' => $this->name_en];
        $this->fee->save();

        $this->resetExcept('fee');

        return redirect()->route('fees.index');
    }
}
