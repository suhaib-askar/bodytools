<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

	public function bodyDensity() {
		if ( floatval($this->chest) && floatval($this->abdominal) && floatval($this->thigh) ) {
			$Y = $this->chest + $this->abdominal + $this->thigh;
			return (Auth::user()->female)?1.0994921 - (0.0009929 * $Y) + (0.0000023 * ($Y * $Y)) - (0.0001392 * Auth::user()->age):1.10938 - (0.0008267 * $Y) + (0.0000016 * ($Y * $Y)) - (0.0002574 * Auth::user()->age);
		}
		
		return null;
    }

	public function bodyFat() {
		if ( floatval($this->abdominal) && floatval($this->tricep) && floatval($this->thigh) && floatval($this->supraspinale) ) {
			$Y = $this->tricep + $this->abdominal + $this->thigh + $this->supraspinale;
			return (Auth::user()->female)?(0.41563 * $Y) - (0.00112 * ($Y * $Y)) + (0.02963 * Auth::user()->age) + 1.4072:(0.29288 * $Y) - (0.0005 * ($Y*$Y)) + (0.15845 * Auth::user()->age) - 5.76377;
		}

		return null;
    }

	public function basalMetabolicRate() {
		return (Auth::user()->female)?(4.35 * $this->weight()) + (4.7 * Auth::user()->height) - (4.68 * Auth::user()->age) - 655:(6.25 * $this->weight()) + (12.7 * Auth::user()->height) - (6.76 * Auth::user()->age) - 66;
    }
}
