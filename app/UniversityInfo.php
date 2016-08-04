<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniversityInfo extends Model
{
    protected $table = 'university_info';

    public function university() {
        return $this->belongsTo('App\University');
    }
}
