<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldProp extends Model
{
    public function university() {
        return $this->belongsTo('App\University');
    }

    public function level() {
        return $this->belongsTo('App\Level');
    }

    public function field() {
        return $this->belongsTo('App\Field');
    }
}
