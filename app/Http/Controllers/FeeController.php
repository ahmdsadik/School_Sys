<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Student;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index()
    {
        return view('fee.index',
            [
                'fees' => Fee::with(['grade:id,name', 'classroom:id,name'])->get(),
            ]
        );
    }

    public function create()
    {
        return view('fee.create');
    }

    public function store(Request $request)
    {
    }

    public function show(Fee $fee)
    {
        return view('fee.show',
            [
                'fee' => $fee,
                'students' => Student::with(
                    [
                        'grade:id,name', 'classroom:id,name', 'section:id,name'
                    ]
                )->where('classroom_id', $fee->classroom_id)->get()
            ]
        );
    }

    public function edit(Fee $fee)
    {
        return view('fee.edit',
            [
                'fee' => $fee
            ]
        );
    }

    public function update(Request $request, Fee $fee)
    {
    }

    public function destroy(Fee $fee)
    {
        $fee->delete();

        return redirect()->back();
    }
}
