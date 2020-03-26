<?php

namespace App\Http\Controllers;

use App\Course;
use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function create(Course $id)
    {
        $course = $id;
        return view('tests.create', compact('course'));
    }

    public function store(Request $request, Course $id)
    {
        $course = $id;
        $test = new Test();
        $test->course_id = $course->id;
        $test->date = $request->get('date');

        if($test->save()) {
            return redirect('/vakken/'. $course->id);
        }

        dd($test);
    }
}
