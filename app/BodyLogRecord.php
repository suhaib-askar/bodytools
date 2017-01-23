<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BodyLogRecord extends Model
{
    protected $fillable  = [
    	'weight_1',
    	'weight_2',
    	'weight_3',
    	'weight_4',
    	'weight_5',
	    'photo_front',
	    'photo_side',
	    'chest',
	    'abdominal',
	    'tricep',
	    'thigh',
	    'supraspinale',
	    'axilla',
	    'subscapular',
	    'forearm',
	    'waist',
	    'age'
    ];

}
