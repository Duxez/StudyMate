<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Deadline extends Model
{

    public function course() {
        return $this->belongsTo('App\Course');
    }

    public static function withCourses($done = false, $orderBy = 'deadlines.id', $direction = 'asc') {
        return DB::table('deadlines')
            ->join('courses', 'deadlines.course_id', '=', 'courses.id')
            ->join('teachers', 'courses.coordinator', '=', 'teachers.id')
            ->select('deadlines.*', 'courses.id AS courseId', 'courses.name', 'teachers.name AS teacherName')->where('deadlines.finished', '=', $done)->orderBy($orderBy, $direction)->paginate(10);
    }
}
