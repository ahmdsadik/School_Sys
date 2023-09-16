<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('attendances.index',
            [
                'grades' => Grade::with(['sections.classroom:id,name'])->get(),
            ]
        );

    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
//        $stds = Student::with(['attendance','gender','classroom','section'])->where('section_id', $id)->get();
//        return $stds;

//        $stds = Student::with(['attendance' => function ($query) {
//            $query->where('date', date('Y-m-d'));
//        }])->where('section_id', $id)->get();
//        return $stds;

//        return  Student::with(['attendance', 'gender', 'classroom', 'section'])->where('section_id', $id)->get();
        return view('attendances.create',
            [
                'students' => Student::with(['attendance', 'gender', 'classroom', 'section'])->where('section_id', $id)->get()
            ]
        );


    }

    public function edit(Attendance $attendance)
    {
    }

    public function update(Request $request, Attendance $attendance)
    {
    }

    public function destroy(Attendance $attendance)
    {
    }
}
