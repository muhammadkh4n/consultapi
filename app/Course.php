<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function fields() {
        return $this->belongsTo('App\Field');
    }
}
