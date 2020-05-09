<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    //TODO: WE HAVE TO CHECK ELOQUENT RELATIONS
    public function teacher() {
        return DB::table('courses')
            ->leftJoin('teachers', 'courses.coordinator', '=', 'teachers.id')
            ->select('teachers.name')
            ->get();
    }

    public static function getCoursesWithTeacher() {
        return DB::table('courses')
            ->leftJoin('teachers', 'courses.coordinator', '=', 'teachers.id')
            ->select('teachers.name as teacher_name', 'courses.*')
            ->get();
    }
}