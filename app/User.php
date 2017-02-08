<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'birthdate', 'height'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAgeAttribute($value) {
		return Carbon::parse($this->birthdate)->diff(Carbon::now())->format('%y');
	}

	public function logs() {
		return $this->hasMany('App\BodyLogRecord');
	}

	public function latestLog() {
		return BodyLogRecord::where('user_id', '=', $this->id)->first();
	}

	public function latestPhotos() {
    	$log = BodyLogRecord::where('user_id', '=', $this->id)->where('photo_front', '<>', 'null')->where('photo_side', '<>', 'null')->first();
		return ['front' => $log->photo_front, 'back' => $log->photo_side];
	}
}
