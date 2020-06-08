<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Deadline extends Model
{
    public static function course($courseId) {
        return DB::table('courses')
            ->where('id', '=', $courseId)->get();
    }

    public static function withCourses($orderBy = 'deadlines.id', $direction = 'asc') {
        return DB::table('deadlines')
            ->join('courses', 'deadlines.course_id', '=', 'courses.id')
            ->join('teachers', 'courses.coordinator', '=', 'teachers.id')
            ->select('deadlines.*', 'courses.id AS courseId', 'courses.name', 'teachers.name AS teacherName')->orderBy($orderBy, $direction)->paginate(10);
    }
}
