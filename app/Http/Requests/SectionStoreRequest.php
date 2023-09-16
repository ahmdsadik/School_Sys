<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'section_name_ar' => ['required', 'unique:sections,name->ar', 'max:255','string'],
            'section_name_en' => ['required', 'unique:sections,name->en', 'max:255','string'],
            'status' => ['nullable'],
            'grade_id' => ['required', 'exists:grades,id'],
            'classroom_id' => ['required', 'exists:classrooms,id'],
            'teacher_id.*' => ['exists:teachers,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
