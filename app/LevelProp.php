<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelProp extends Model
{
    public function university() {
        return $this->belongsTo('App\University');
    }

    public function level() {
        return $this->belongsTo('App\Level');
    }
}
