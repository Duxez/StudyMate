<?php

namespace App\Http\Controllers;

use App\Course;
use App\Deadline;
use App\Http\Requests\StoreDeadline;
use App\Http\Requests\UpdateDeadline;
use DateTime;
use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deadlines = Deadline::paginate(10);
        return view("deadline.index")->with(compact('deadlines'));
    }

    /**
     * Display a sorted listing of the resource based on the passed sorting
     *
     * @param Request $request
     * @return void
     */
    public function indexSorted(Request $request)
    {
        $sortOn = $request->query('sortOn');
        $deadlines = Deadline::where('finished', '=', 0)->paginate(10);

        if($request->query('direction') == 'asc') {
            $deadlines->sortBy(function ($deadline) {
                return $deadline->course->teachers->name;
            });
        } else {
            $deadlines->sortByDesc(function ($deadline) {
                return $deadline->course->teachers->name;
            });
        }

        return view("deadline.index")->with(compact('deadlines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $courses = Course::all();
        return view('deadline.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(StoreDeadline $request)
    {
        if ($request->validated()) {
            $d = new DateTime($request->date_submit . "T" . $request->time . ":00.00");
            $deadline = new Deadline();
            $deadline->datetime = $d;
            $deadline->course_id = $request->course;
            $deadline->tags = $request->tags;
            $deadline->type = $request->type;

            if($deadline->save()) {
                return redirect('/deadline');
            }

            $request->session()->flash('error', 'Kon deadline niet aanmaken');
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param Deadline $deadline
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Deadline $deadline)
    {
        return view('deadline.show', compact('deadline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Deadline $deadline
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Deadline $deadline)
    {
        $courses = Course::all();
        return view('deadline.edit', compact('deadline', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(UpdateDeadline $request, Deadline $deadline)
    {
        if ($request->validated()) {
            $d = new DateTime($request->date_submit . "T" . $request->time . ":00.00");
            $deadline->datetime = $d;
            $deadline->course_id = $request->course;
            $deadline->tags = $request->tags;
            $deadline->type = $request->type;
            $deadline->save();
            return redirect("/deadline/". $deadline->id);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Deadline $deadline
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Deadline $deadline)
    {
        $deadline->delete();
        return back();
    }
}
