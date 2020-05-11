<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    public function courses() {
        return $this->belongsToMany('App\Course');
    }

    public function checkTeaches($teaches) : bool
    {
        if ($teaches === "on") {
            return true;
        } else {
            return false;
        }
    }

    public function attachCourses($courses) {
        if ($courses != null) {
            foreach ($courses as $course) {
                if (!$this->courses()->where('id', $course)->exists()) {
                    $this->courses()->attach($course);
                }
            }
        }
    }

}
