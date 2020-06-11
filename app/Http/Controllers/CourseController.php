<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\StoreCourse;
use App\Http\Requests\UpdateCourse;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('course.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCourse $request)
    {
        $course = new Course();
        if ($request->validated()) {
            $course->name = $request->get('name');
            $course->period = $request->get('period');
            $course->coordinator = $request->get('teacher');
            $course->ECTS = $request->get('ECTS');

            if ($course->save()) {
                return redirect('/vakken');
            }

            $request->session()->flash('error', 'Kon vak niet aanmaken');
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Course $course)
    {
        $teacher = Teacher::find($course->coordinator);
        return view("course.show", compact('course', 'teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Course $course)
    {
        $teachers = Teacher::all();
        return view('course.edit', compact('course', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateCourse $request, Course $course)
    {
        if ($request->validated()) {
            $course->name = $request->get('name');
            $course->period = $request->get('period');
            $course->coordinator = $request->get('teacher');
            $course->ECTS = $request->get('ECTS');
            $course->save();
            return redirect("/vakken");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return back();
    }

}
