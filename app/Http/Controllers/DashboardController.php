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
        $courses = Course::all()->sortBy('period')->values();

        $studyPoints = [];
        $percent = [];
        $points = DB::select(DB::raw('SELECT period, SUM(ECTS) as points FROM courses GROUP BY period'));
        $studyPointsRows = DB::select(DB::raw('SELECT c.period, c.ECTS as points FROM courses c INNER JOIN tests t ON c.id = t.course_id WHERE t.grade > 5.4 GROUP BY period, points'));
        $periodsDone = [];
        foreach ($courses as $course) {
            if ($course->period > count($studyPoints)) {
                $studyPoints['blok' . $course->period] = 0;
            }
            if(!in_array($course->period, $periodsDone)) {
                foreach ($studyPointsRows as $row) {
                    if ($row->period == $course->period) {

                        $studyPoints['blok' . $course->period] += $row->points;
                        array_push($periodsDone, $course->period);
                    }
                }
            }
        }
//        dd($studyPoints);
        $lastPeriod = 0;
        $periodsCalculated = [];
        for ($i = 0; $i < count($courses); $i++) {
            $course = $courses[$i];
            if ($course->period > $lastPeriod) {
                array_push($periodsCalculated, $course->period);
                $calculated = $studyPoints['blok' . $course->period] / $points[count($periodsCalculated) - 1]->points * 100;
                $points['blok' . $course->period] = $points[count($periodsCalculated) - 1]->points;
                $percent['blok' . $course->period] = $calculated;
                $lastPeriod = $course->period;
            }
        }
        return view('dashboard', compact('courses', 'points', 'studyPoints', 'percent'));
    }
}
