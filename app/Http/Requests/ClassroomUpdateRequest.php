<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:classrooms', 'integer','unique:classrooms,name->ar,NULL,id,grade_id,' . $this->grade_id],
            'classroom_ar' => ['required', 'string', 'max:255','unique:classrooms,name->en,NULL,id,grade_id,' . $this->grade_id],
            'classroom_en' => ['required', 'string', 'max:255'],
            'grade_id' => ['required', 'exists:grades,id', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => __('classroom_list.classroom_id_required'),
            'id.exists' => __('classroom_list.classroom_id_exists'),
            'classroom_ar.required' => __('classroom_list.classroom_ar_required'),
            'classroom_ar.max' => __('classroom_list.classroom_ar_max'),
            'classroom_ar.unique' => __('classroom_list.classroom_ar_unique'),
            'classroom_en.required' => __('classroom_list.classroom_en_required'),
            'classroom_en.max' => __('classroom_list.classroom_en_max'),
            'classroom_en.unique' => __('classroom_list.classroom_en_unique'),
            'grade_id.required' => __('classroom_list.grade_id_required'),
            'grade_id.exists' => __('classroom_list.grade_id_exists'),
        ];
    }
}
