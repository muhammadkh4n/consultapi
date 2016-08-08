<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function levels() {
        return $this->belongsTo('App\Level');
    }

    public function courses() {
        return $this->hasMany('App\Course');
    }
}
