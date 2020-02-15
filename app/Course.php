<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function teachers() {
        return $this->belongsToMany('App\Teacher')->withTimestamps();
    }
}
