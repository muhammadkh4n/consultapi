<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    public function university_info() {
        return $this->hasOne('App\UniversityInfo');
    }
}
