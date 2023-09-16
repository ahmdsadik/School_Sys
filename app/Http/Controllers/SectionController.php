<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionStoreRequest;
use App\Http\Requests\SectionUpdateRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        return view('sections.index', [
            'grades' => Grade::with(['sections:id,name', 'classrooms:id,name'])->get(),
            'teachers' => Teacher::select('id', 'name')->get(),
        ]);
    }

    public function create()
    {
    }

    public function store(SectionStoreRequest $request)
    {
        $validated = $request->validated();
        $sectoin = Section::create([
            'name' => ['en' => $validated['section_name_en'], 'ar' => $validated['section_name_ar']],
            'grade_id' => $validated['grade_id'],
            'classroom_id' => $validated['classroom_id'],
        ]);
        $sectoin->teachers()->attach($validated['teacher_id']);
        return back()->with('message', ['type' => 'success', 'text' => __('section_list.section_added')]);
    }

    // attach() method is used to add a record to the intermediate table.
    // detach() method is used to remove a record from the intermediate table.
    // sync() method is used to synchronize the intermediate table with the given IDs.
    // toggle() method is used to add or remove a record from the intermediate table.
    // syncWithoutDetaching() method is used to add a record to the intermediate table without detaching existing records.
    // syncWithPivotValues() method is used to synchronize the intermediate table with the given IDs and custom values.
    // syncWithoutDetachingWithPivotValues() method is used to add a record to the intermediate table without detaching existing records and with custom values.
    // updateExistingPivot() method is used to update an existing record in the intermediate table.

    public function show(Section $section)
    {
    }

    public function edit(Section $section)
    {
    }

    public function update(SectionUpdateRequest $request)
    {
        $validated = $request->validated();
        $section = Section::findOrFail($request->id);
        $section->update([
            'name' => ['en' => $validated['section_name_en'], 'ar' => $validated['section_name_ar']],
            'grade_id' => $validated['grade_id'],
            'status' => isset($validated['status']) ? 1 : 0,
            'classroom_id' => $validated['classroom_id'],
        ]);

        $section->teachers()->sync($validated['teacher_id']);

        return back()->with('message', ['type' => 'success', 'text' => __('section_list.section_updated')]);
    }

    public function destroy(Request $request)
    {
        $section = Section::findOrFail($request->id);
        $section->delete();
        return back()->with('message', ['type' => 'success', 'text' => __('section_list.section_deleted')]);
    }
}
