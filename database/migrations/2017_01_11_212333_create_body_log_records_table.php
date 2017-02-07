<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodyLogRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_log_records', function (Blueprint $table) {
            $table->increments('id');
	        $table->float('weight_1');
	        $table->float('weight_2');
	        $table->float('weight_3');
	        $table->float('weight_4');
	        $table->float('weight_5');
	        $table->string('photo_front')->nullable();
	        $table->string('photo_side')->nullable();

	        $table->float('chest')->nullable();
	        $table->float('abdominal')->nullable();
	        $table->float('axilla')->nullable();
	        $table->float('tricep')->nullable();
	        $table->float('subscapular')->nullable();
	        $table->float('thigh')->nullable();
	        $table->float('supraspinale')->nullable();
	        $table->float('glutealCircumference')->nullable();
	        $table->float('waist')->nullable();
	        $table->float('forearm')->nullable();
	        $table->integer('age')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('body_log_records');
    }
}
