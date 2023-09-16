<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'=> ['required', 'exists:grades,id'],
            'grade_name_ar' => ['required', 'string', 'max:255', 'unique:grades,name->ar,' . $this->id],
            'grade_name_en' => ['required', 'string', 'max:255', 'unique:grades,name->en,' . $this->id],
            'notes' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => __('validation.required', ['attribute' => __('grades_list.id')]),
            'id.exists' => __('validation.exists', ['attribute' => __('grades_list.id')]),
            'grade_name_ar.required' => __('validation.required', ['attribute' => __('grades_list.grade_name_ar')]),
            'grade_name_en.required' => __('validation.required', ['attribute' => __('grades_list.grade_name_en')]),
        ];
    }
}
