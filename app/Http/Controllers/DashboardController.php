<?php


namespace App\Http\Controllers;


use App\Course;
use App\Test;

class DashboardController extends Controller
{

    public function index()
    {
        $courses = Course::all()->sortBy('period');
        return view('dashboard', compact('courses'));
    }

}
