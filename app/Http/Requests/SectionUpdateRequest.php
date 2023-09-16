<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:sections,id'],
            'section_name_ar' => ['required', 'max:255', 'string', 'unique:sections,name->ar,' . $this->id],
            'section_name_en' => ['required', 'max:255', 'string', 'unique:sections,name->en,' . $this->id],
            'status' => ['nullable'],
            'grade_id' => ['required', 'exists:grades,id'],
            'classroom_id' => ['required', 'exists:classrooms,id'],
            'teacher_id.*' => ['exists:teachers,id'],
        ];
    }
}
