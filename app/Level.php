<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function universities() {
        return $this->belongsTo('App\University');
    }

    public function fields() {
        return $this->hasMany('App\Field');
    }
}
