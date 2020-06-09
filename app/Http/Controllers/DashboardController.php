<?php


namespace App\Http\Controllers;


use App\Course;
use App\Test;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $courses = Course::all()->sortBy('period');

        $studyPoints = [];
        $percent = [];
        $points = DB::select(DB::raw('SELECT period, SUM(ECTS) as points FROM courses GROUP BY period'));

        foreach ($courses as $course) {
            if ($course->period > count($studyPoints)) {
                array_push($studyPoints, 0);
            }

            $passedTests = true;
            for ($i = 0; $i < count($course->tests); $i++) {
                $test = $course->tests[$i];
                if ($test->grade == null || $test->grade < 5.5) {
                    $passedTests = false;
                }
                if ($passedTests && $i == count($course->tests) - 1) {
                    $studyPoints[count($studyPoints) - 1] += $course->ECTS;
                }
            }
        }


        $lastPeriod = 0;

        foreach ($courses as $course) {

            if ($course->period > $lastPeriod) {
                $calculated = $studyPoints[$course->period - 1] / $points[$course->period - 1]->points * 100;
                array_push($percent, $calculated);
            }
            $lastPeriod = $course->period;
        }


        return view('dashboard', compact('courses', 'points', 'studyPoints', 'percent'));
    }

}
