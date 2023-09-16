<?php

namespace App\Http\Livewire;

use App\Models\Blood_type;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Student;
use App\Models\StudentParent;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddStudent extends Component
{
    use WithFileUploads;

    public $name_ar,
        $name_en,
        $email,
        $password,

        $gender_id,
        $nationality_id,
        $blood_type_id,
        $date_of_birth,
        $grade_id,
        $classroom_id,
        $section_id,
        $parent_id,
        $academic_year,

        $grades = [],
        $classrooms = [],
        $sections = [],
        $genders = [],
        $parents = [],
        $nationalities = [],
        $blood_types = [],
        $academic_years = [],
        $photos = [];

    protected $rules =
        [
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'password' => 'required|min:3',
            'gender_id' => 'required|numeric|exists:genders,id',
            'nationality_id' => 'required|numeric|exists:nationalities,id',
            'blood_type_id' => 'required|numeric|exists:blood_types,id',
            'date_of_birth' => 'required|date|before:5 years ago',
            'grade_id' => 'required|numeric|exists:grades,id',
            'classroom_id' => 'required|numeric|exists:classrooms,id',
            'section_id' => 'required|numeric|exists:sections,id',
            'parent_id' => 'required|numeric|exists:student_parents,id',
            'academic_year' => 'required|date_format:Y',

        ];

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function updatedGradeId($value): void
    {
        $this->classrooms = $this->grade_id ? Classroom::where('grade_id', $value)->get() : [];
    }

    public function updatedClassroomId($value): void
    {
        $this->sections = $this->classroom_id ? Section::where('classroom_id', $value)->get() : [];
    }

    public function mount(): void
    {
        $this->grades = Grade::select(['id', 'name'])->get();
        $this->parents = StudentParent::select(['id', 'father_name'])->get();
        $this->genders = Gender::select(['id', 'name'])->get();
        $this->nationalities = Nationality::select(['id', 'name'])->get();
        $this->blood_types = Blood_type::select(['id', 'type'])->get();
        $this->academic_years = range(date('Y'), date('Y', strtotime('+1 years')));
    }

    public function render()
    {
        return view('livewire.add-student');
    }

    public function submit()
    {
        $this->validate();

        DB::transaction(function () {
            $std = Student::create([
                'name' => ['en' => $this->name_en, 'ar' => $this->name_ar],
                'email' => $this->email,
                'password' => $this->password,
                'gender_id' => $this->gender_id,
                'nationality_id' => $this->nationality_id,
                'blood_type_id' => $this->blood_type_id,
                'date_birth' => $this->date_of_birth,
                'grade_id' => $this->grade_id,
                'classroom_id' => $this->classroom_id,
                'section_id' => $this->section_id,
                'student_parent_id' => $this->parent_id,
                'academic_year' => $this->academic_year,
            ]);

            foreach ($this->photos as $photo) {
                $photo->storeAs($std->id, $photo->getClientOriginalName(), 'StudentAttachments');
                $std->images()->create(['url' => $photo->getClientOriginalName()]);
            }

        });

        $this->photos = [];
        $this->reset();
        return redirect()->route('students.index');
    }
}


