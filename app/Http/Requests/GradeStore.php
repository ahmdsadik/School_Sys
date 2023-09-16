<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'grade_name_ar' => ['required', 'string', 'max:255', 'unique:grades,name->ar'],
            'grade_name_en' => ['required', 'string', 'max:255', 'unique:grades,name->en'],
            'notes' => ['nullable' ,'string', 'max:255'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'grade_name_ar.required' => __('validation.required', ['attribute' => __('grades_list.grade_name_ar')]),
            'grade_name_en.required' => __('validation.required', ['attribute' => __('grades_list.grade_name_en')]),
            'grade_name_ar.max' => __('validation.max.string', ['attribute' => __('grades_list.grade_name_ar'), 'max' => 255]),
            'grade_name_en.max' => __('validation.max.string', ['attribute' => __('grades_list.grade_name_en'), 'max' => 255]),
            'grade_name_ar.unique' => __('grades_list.grade_name_unique'),
        ];
    }
}
