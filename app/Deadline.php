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
}
