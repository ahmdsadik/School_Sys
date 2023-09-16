<?php

namespace App\Http\Livewire\Fee;

use App\Models\Fee;
use App\Models\Grade;
use Livewire\Component;

class CreateFee extends Component
{
    public $name_ar,
        $name_en,
        $amount,
        $grade_id,
        $classroom_id,
        $year,
        $description,

        $grades = [],
        $classrooms = [],
        $years = [];

    protected $rules =
        [
            'name_ar' => 'required|min:4',
            'name_en' => 'required|min:4',
            'amount' => 'required|integer',
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:classrooms,id|unique:fees,classroom_id',
            'year' => 'required|date_format:Y',
            'description' => 'string|nullable'
        ];

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function updatedGradeId($value): void
    {
        $this->classrooms = $this->grade_id ? Grade::find($value)->classrooms : [];
    }

    public function mount(): void
    {
        $this->grades = Grade::all();
        $this->years = range(date('Y'), date('Y', strtotime('+1 years')));
    }

    public function render()
    {
        return view('livewire.fee.create-fee');
    }

    public function submit()
    {
        $this->validate();

        Fee::create([
            'title' => ['ar' => $this->name_ar, 'en' => $this->name_en],
            'amount' => $this->amount,
            'grade_id' => $this->grade_id,
            'classroom_id' => $this->classroom_id,
            'year' => $this->year,
            'description' => $this->description
        ]);

        $this->reset();

        return redirect()->route('fees.index');
    }
}
