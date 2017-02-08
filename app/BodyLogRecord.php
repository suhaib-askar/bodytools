<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BodyLogRecord extends Model
{
    protected $fillable  = [
    	'user_id',
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

	public function user() {
		return $this->belongsTo('app\User');
    }

	public function weight() {
		return ($this->weight_1 + $this->weight_2 + $this->weight_3 + $this->weight_4 + $this->weight_5) / 5;
    }

	public function bodyDensity() {

		if ( floatval($this->chest) && floatval($this->abdominal) && floatval($this->thigh) ) {

			if ( floatval($this->glutealCircumference) )
			{
				// 3-point with girth

				if ( Auth::user()->female ) {
					// female 3-point w/ girth requires tricep, thigh, suprailiac, age and gluteal circumference
					$Y = floatval($this->tricep) + floatval($this->supraspinale) + floatval($this->thigh);
					return round(
						1.1470292 - (0.0009376 * $Y) + (0.0000030 * ($Y * $Y)) - (0.0001156 * Auth::user()->age) - (0.0005839 * $this->glutealCircumference),
						2
					);
                }

				// male 3-point w/ girth requires chest, abdomen, thigh, age, waist circumference, and forearm circumference
				$Y = floatval($this->chest) + floatval($this->abdominal) + floatval($this->thigh);
				return round(
					1.0990750 - (0.0008209 * $Y) + (0.0000026 * ($Y * $Y)) -  (0.0002017 * Auth::user()->age) - (0.005675 * $this->waist) + (0.018586 * $this->forearm),
					2
				);
			}

			if ( floatval($this->axilla) && floatval($this->tricep) && floatval($this->supraspinale) && floatval($this->subscapular) )
			{
				// 7-point
				$Y = floatval($this->axilla) + floatval($this->chest) + floatval($this->tricep) + floatval($this->subscapular) + floatval($this->abdominal) + floatval($this->supraspinale) + floatval($this->thigh);
				return round(
					(( Auth::user()->female ) ?
							1.097 - (0.00046971  * $Y) + (0.00000056 * ($Y * $Y)) - (0.00012828  * Auth::user()->age) :
							1.112 - (0.00043499 * $Y) + (0.00000055 * ($Y*$Y)) - (0.00028826 * Auth::user()->age)
					),
					2
				);
			}

			// 3-point fallback
			$Y = $this->chest + $this->abdominal + $this->thigh;
			return round(
					((Auth::user()->female) ?
						1.0994921 - (0.0009929 * $Y) + (0.0000023 * ($Y * $Y)) - (0.0001392 * Auth::user()->age) :
						1.10938 - (0.0008267 * $Y) + (0.0000016 * ($Y * $Y)) - (0.0002574 * Auth::user()->age)
					),
					2
			);
		}
		
		return null;
    }

	public function bodyFat() {

		if ( floatval($this->abdominal) && floatval($this->tricep) && floatval($this->thigh) && floatval($this->supraspinale) ) {
			// 4-site
			$Y = $this->tricep + $this->thigh + $this->supraspinale + $this->abdominal;

			if ( floatval($this->chest) && floatval($this->subscapular) && floatval($this->axilla) )
			{
				// 7-site
					$Y += $this->chest + $this->subscapular + $this->axilla;
				return round(
					(Auth::user()->female) ?
						( 495 / (1.097-(0.00046971 * $Y)+(0.00000056 * ($Y*$Y)) - (0.00012828 * Auth::user()->age)) - 450 )
						:
						( 495 / (1.112 - (0.00043499 * $Y) + (0.00000055 * ($Y*$Y) ) - (0.00028826 * Auth::user()->age) ) - 450 ),
					2
				);
			}

			return round(
				(Auth::user()->female) ?
					(0.41563 * $Y) - (0.00112 * ($Y * $Y)) + (0.02963 * Auth::user()->age) + 1.4072
					:
					(0.29288 * $Y) - (0.0005 * ($Y*$Y)) + (0.15845 * Auth::user()->age) - 5.76377,
				2
			);
		}


		return null;
    }

	public function basalMetabolicRate() {
 		return round(
			(
				(Auth::user()->female)?
					447.593 + ( 9.247 * ( $this->weight() / 2.20462 ) ) + ( 3.098 * ( Auth::user()->height / 0.393701 ) ) - ( 4.330 * Auth::user()->age )
					:
					88.362 + ( 13.397 * ( $this->weight() / 2.20462 ) ) + ( 4.799 * ( Auth::user()->height / 0.393701 ) ) - ( 5.677 * Auth::user()->age )
			),
			2
		);
    }
}
