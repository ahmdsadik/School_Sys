<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index',
            [
                'students' => Student::with(
                    [
                        'bloodType:id,type', 'nationality:id,name', 'grade:id,name', 'classroom:id,name', 'section:id,name'
                    ]
                )->get(),
            ]
        );
//                'students' => Student::latest()->paginate(5)
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
    }

    public function show(Student $student)
    {
        return view('students.show',
            [
                'student' => $student->load(
                    [
                        'images', 'gender:id,name', 'bloodType:id,type', 'nationality:id,name', 'grade:id,name', 'classroom:id,name', 'section:id,name', 'parent:id,father_name'
                    ]
                )
            ]
        );
    }

    public function edit(Student $student)
    {
    }

    public function update(Request $request, Student $student)
    {
    }

    public function destroy(Student $student)
    {
        DB::transaction(function () use ($student) {

            $student->images()->delete();

            $student->delete();
        });
        Storage::disk('StudentAttachments')->deleteDirectory($student->id);

        return redirect()->route('students.index');
    }

    public function showAttachment($path, $filename)
    {
        return Storage::disk('StudentAttachments')->response($path . DIRECTORY_SEPARATOR . $filename);
    }

    public function downloadAttachment($path, $filename)
    {
        return Storage::disk('StudentAttachments')->download($path . DIRECTORY_SEPARATOR . $filename);
//                return Storage::disk('StudentAttachments')->download($filename, 'std_attachment', ['Content-Disposition' => 'inline']);
    }

    public function deleteAttachment(Image $image)
    {
        DB::transaction(function () use ($image) {
            $image->delete();
            Storage::disk('StudentAttachments')->delete($image->imageable_id . DIRECTORY_SEPARATOR . $image->url);
        });
        return back();
    }
}
