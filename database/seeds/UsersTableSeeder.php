<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Clifton Molina',
            'email' => 'clifmo@gmail.com',
            'password' => bcrypt('n00bsaibot'),
            'birthdate' => Carbon::parse('September 8th, 1983'),
            'height' => 72
        ]);
    }
}
