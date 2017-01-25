<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [ 'name', 'cardio', 'major_muscle_group', 'five_repetition_maximum' ];
}
