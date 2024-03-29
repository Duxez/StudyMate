<?php

namespace App\Http\Controllers;

use App\Course;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function create(Course $course)
    {
        return view('tests.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $test = new Test();
        $test->course_id = $course->id;
        $test->date = $request->get('date');
        $test->filename = null;

        if ($request->get('assesment') == 'on') {
            $test->assesment = true;
        } else {
            $test->assesment = false;
        }

        if ($test->save()) {
            return redirect('/vakken/' . $course->id);
        }

    }


    public function uploadAssesment(Request $request, Course $course)
    {
        if (!$file = $request->file('bestand')) {
            return back()->withErrors(['fileUploadError' => 'Selecteer een .zip file']);
        }

        if ($file->getClientOriginalExtension() == 'zip') {
            Storage::disk('local')->putFileAs(
                'files/assesments',
                $file,
                $file->getClientOriginalName()
            );

            $test = Test::find($request->id);
            $test->filename = $file->getClientOriginalName();
            $test->save();

            return back();
        }

        return back()->withErrors(['fileError' => 'Upload alleen maar een .zip bestand!']);
    }

    public function gradeAssesment(Request $request, Course $course)
    {
        if (!$grade = $request->get('grade')) {
            return back()->withErrors(['gradeError' => 'Alleen een cijfer tussen de 1 en de 10']);
        }

        $test = Test::find($request->get('id'));

        $test->grade = $grade;

        $test->save();

        return back()->with('success', 'Je cijfer is geupdate!');
    }

}
