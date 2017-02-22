<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$exercises = [
    	    'sb' => [
    	    	'name' => 'Static Back',
    	    	'type' => 'static stretch',
    	    	'major_muscle_group' => '',
    	    	'five_repetition_max' => null,
    	    	'created_at' => Carbon::now(),
    	    	'updated_at' => Carbon::now(),
	        ],
	        'sepe' => [
		        'name' => 'Static Back',
		        'type' => 'static stretch',
		        'major_muscle_group' => '',
		        'five_repetition_max' => null,
		        'created_at' => Carbon::now(),
		        'updated_at' => Carbon::now(),
	        ],
	        'sbp' => [
		        'name' => 'Static Back',
		        'type' => 'static stretch',
		        'major_muscle_group' => '',
		        'five_repetition_max' => null,
		        'created_at' => Carbon::now(),
		        'updated_at' => Carbon::now(),
	        ],
	        'abp' => [
		        'name' => 'Static Back',
		        'type' => 'static stretch',
		        'major_muscle_group' => '',
		        'five_repetition_max' => null,
		        'created_at' => Carbon::now(),
		        'updated_at' => Carbon::now(),
	        ],
	        'wff' => [
		        'name' => 'Fist Flex',
		        'type' => 'dynamic stretch',
		        'major_muscle_group' => '',
		        'five_repetition_max' => null,
		        'created_at' => Carbon::now(),
		        'updated_at' => Carbon::now(),
	        ],
	        'wsf' => [
		        'name' => 'Finger Spread',
		        'type' => 'dynamic stretch',
		        'major_muscle_group' => '',
		        'five_repetition_max' => null,
		        'created_at' => Carbon::now(),
		        'updated_at' => Carbon::now(),
	        ],
	        'wsd' => [
		        'name' => 'Wrist Stretch Down',
		        'type' => 'static stretch',
		        'major_muscle_group' => '',
		        'five_repetition_max' => null,
		        'created_at' => Carbon::now(),
		        'updated_at' => Carbon::now(),
	        ],
	        'wsu' => [
		        'name' => 'Wrist Stretch Up',
		        'type' => 'static stretch',
		        'major_muscle_group' => '',
		        'five_repetition_max' => null,
		        'created_at' => Carbon::now(),
		        'updated_at' => Carbon::now(),
	        ],
	        'wkd' => [
		        'name' => 'Wrist Knee Down',
		        'type' => 'static stretch',
		        'major_muscle_group' => '',
		        'five_repetition_max' => null,
		        'created_at' => Carbon::now(),
		        'updated_at' => Carbon::now(),
	        ],
	        'wkc' => [
		        'name' => 'Wrist Knee Curl',
		        'type' => 'static stretch',
		        'major_muscle_group' => '',
		        'five_repetition_max' => null,
		        'created_at' => Carbon::now(),
		        'updated_at' => Carbon::now(),
	        ],
	        'wrc' => [
		        'name' => 'Wrist Reverse Curl',
		        'type' => 'static stretch',
		        'major_muscle_group' => '',
		        'five_repetition_max' => null,
		        'created_at' => Carbon::now(),
		        'updated_at' => Carbon::now(),
	        ],
	        'frc' => [
		        'name' => 'Finger Reverse Curl',
		        'type' => 'static stretch',
		        'major_muscle_group' => '',
		        'five_repetition_max' => null,
		        'created_at' => Carbon::now(),
		        'updated_at' => Carbon::now(),
	        ],
	        'sb' => [
		        'name' => 'Static Back',
		        'type' => 'static stretch',
		        'major_muscle_group' => '',
		        'five_repetition_max' => null,
		        'created_at' => Carbon::now(),
		        'updated_at' => Carbon::now(),
	        ],

	    ];

    	foreach ( $exercises as $key => $exercise )
	    {
		    DB::table('exercises')->insert(['code' => $key] + $exercise);
	    }

    }
}
