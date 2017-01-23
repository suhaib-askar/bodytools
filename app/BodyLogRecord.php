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

	public function weight() {
		return ($this->weight_1 + $this->weight_2 + $this->weight_3 + $this->weight_4 + $this->weight_5) / 5;
    }
}
