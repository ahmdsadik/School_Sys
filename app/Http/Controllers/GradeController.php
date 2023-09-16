<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeStore;
use App\Http\Requests\GradeUpdateRequest;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('grades.index', ['grades' => Grade::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GradeStore $request)
    {
        $validated = $request->validated();
        Grade::create([
            'name' => ['en' => $validated['grade_name_en'], 'ar' => $validated['grade_name_ar']],
            'notes' => $validated['notes'],
        ]);

        return back()->with('message', ['type' => 'success', 'text' => __('grades_list.grade_added')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        return $grade;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GradeUpdateRequest $request)
    {
        $validated = $request->validated();
        $grade = Grade::findOrFail($request['id']);
        $grade->update([
            'name' => ['en' => $validated['grade_name_en'], 'ar' => $validated['grade_name_ar']],
            'notes' => $validated['notes'],
        ]);

        return back()->with('message', ['type' => 'success', 'text' => __('grades_list.grade_updated')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $grade = Grade::findOrFail($request['id']);

        if ($grade->hasClassrooms()) {
            return back()->with('message', ['type' => 'error', 'text' => __('grades_list.grade_has_classrooms')]);
        }
        $grade->delete();

        return back()->with('message', ['type' => 'success', 'text' => __('grades_list.grade_deleted')]);
    }
}
