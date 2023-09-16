<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teachers.index',
            [
                'teachers' => Teacher::with(['gender', 'specialization'])->get()
            ]
        );
    }

    public function create()
    {
        return view('teachers.create',
            [
                'genders' => Gender::all(['id', 'name']),
                'specializations' => Specialization::all(['id', 'name']),
            ]
        );
    }

    public function store(Request $request)
    {
        // add name to $request
        $request->merge([
            'name' => [
                'ar' => $request->get('name_ar'),
                'en' => $request->get('name_en'),
            ]
        ]);

        Teacher::create($request->except('_token', '_method'));
        return redirect()->route('teachers.index');
    }

    public function show(Teacher $teacher)
    {
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit',
            [
                'teacher' => $teacher,
                'genders' => Gender::all(['id', 'name']),
                'specializations' => Specialization::all(['id', 'name']),
            ]
        );
    }

    public function update(Request $request, Teacher $teacher)
    {
        // add name to $request
        $request->merge([
            'name' => [
                'ar' => $request->get('name_ar'),
                'en' => $request->get('name_en'),
            ]
        ]);


        $teacher->update($request->except('_token', '_method', 'password'));

        return redirect()->route('teachers.index');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index');
    }
}
