<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function field() {
        return $this->belongsTo('App\Field');
    }

    public function level() {
        return $this->belongsTo('App\Level');
    }

    public function university() {
        return $this->belongsTo('App\University');
    }
}
