<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    public function info() {
        return $this->hasOne('App\UniversityInfo');
    }

    public function level_props() {
        return $this->hasMany('App\LevelProp');
    }

    public function field_props() {
        return $this->hasMany('App\FieldProp');
    }

    public function courses() {
        return $this->hasMany('App\Course');
    }
}
