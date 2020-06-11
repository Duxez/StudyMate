<?php

namespace App;

use App\Traits\EncrypTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{

    use EncrypTable;

    protected $encryptable = [
        'name',
    ];

    public function tests()
    {
        return $this->hasMany('App\Test');
    }

    public function teachers()
    {
        return $this->belongsTo('App\Teacher', 'coordinator');
    }

}
