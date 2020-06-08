<?php


namespace App\Http\Controllers;


use App\Course;
use App\Test;

class DashboardController extends Controller
{

    public function index()
    {
        $periods = [];
        $courses = Course::all();
        return view('dashboard', compact('courses'));
    }

}
