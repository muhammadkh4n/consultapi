<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function field_props() {
        return $this->hasMany('App\FieldProp');
    }

    public function level_props() {
        return $this->hasMany('App\LevelProp');
    }

    public function courses() {
        return $this->hasMany('App\Course');
    }
}
