<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\StoreTeacher;
use App\Http\Requests\UpdateTeacher;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Teacher::all();
        return view('teacher.docent', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $courses = Course::all();
        return view('teacher.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreTeacher $request)
    {
        if ($request->validated()) {

            $teacher = new teacher();
            $teacher->name = $request->get('name');
            $teacher->email = $request->get('email');
            $teacher->phone = $request->get('number');

            $teacher->teaches = $teacher->checkTeaches($request->get('teaches'));

            $courses = $request->get('courses');
            if ($teacher->save()) {
                $teacher->courses()->detach($teacher->courses);
                $teacher->attachCourses($courses);

                return redirect('/docenten');
            }

            $request->session()->flash('error', 'Kon docent niet aanmaken');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Teacher $teacher
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Teacher $teacher)
    {
        $data = Teacher::find($teacher);
        return view('teacher.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\teacher $teacher
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Teacher $teacher)
    {
        $courses = Course::all();
        return view('teacher.edit', compact('teacher', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\teacher $teacher
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateTeacher $request, Teacher $teacher)
    {
        if ($request->validated()) {

            $teacher->name = $request->get('name');
            $teacher->email = $request->get('email');
            $teacher->phone = $request->get('number');
            $teacher->teaches = $teacher->checkTeaches($request->get('teaches'));
            if ($teacher->save()) {
                $courses = $request->get('courses');
                $teacher->courses()->detach($teacher->courses);
                $teacher->attachCourses($courses);
                return redirect("/docenten/" . $teacher->id);
            }
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\teacher $teacher
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return back();
    }
}
