<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomStoreRequest;
use App\Http\Requests\ClassroomUpdateRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ClassroomController extends Controller
{
    public function index()
    {
        return view('classrooms.index', [
            'classrooms' => Classroom::with(['grade'])->get(),
            'grades' => Grade::all(),
        ]);
    }

    public function create()
    {
    }

    public function store(ClassroomStoreRequest $request)
    {
        $request = $request->validated();
        Classroom::create([
            'name' => [
                'ar' => $request['classroom_ar'],
                'en' => $request['classroom_en'],
            ],
            'grade_id' => $request['grade_id'],
        ]);
        return back()->with('message', ['type' => 'success', 'text' => __('classroom_list.classroom_added')]);
    }

    public function show(Classroom $classroom)
    {
    }

    public function edit(Classroom $classroom)
    {
    }

    public function update(ClassroomUpdateRequest $request)
    {
        $validated = $request->validated();
        $classroom = Classroom::find($validated['id']);
        $classroom->update([
            'name' => [
                'ar' => $validated['classroom_ar'],
                'en' => $validated['classroom_en'],
            ],
            'grade_id' => $validated['grade_id'],
        ]);
        return back()->with('message', ['type' => 'success', 'text' => __('classroom_list.classroom_updated')]);
    }

    public function destroy(Request $request)
    {
        $classroom = Classroom::findOrFail($request->id);
        $classroom->delete();
        return back()->with('message', ['type' => 'success', 'text' => __('classroom_list.classroom_deleted')]);
    }

    public function allClasses($grade_id)
    {
        $classes = Classroom::where('grade_id', $grade_id)->get(['id', 'name']);
        return response()->json($classes);
    }
}
