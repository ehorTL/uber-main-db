<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->string('id', 40)->unique();
            $table->timestamps();

            $table->string('email');
            $table->string('phone');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');

            $table->tinyInteger('capacity')->default(3);
            $table->boolean('accepts_rides')->default(false);
            $table->boolean('on_the_ride')->default(false);
            $table->unsignedBigInteger('car_class_id');

            $table->string('note')->nullable();
            // $table->unsignedBigInteger('car_statuss_id')->nullable();

            $table->float('coord_latitude')->nullable();
            $table->float('coord_longitude')->nullable();
        });

        Schema::table('cars', function (Blueprint $table) {
            // onDelete('RESTRICT') by default
            $table->foreign('car_class_id')->references('id')->on('car_classes');
            // $table->foreign('car_status_id')->references('id')->on('car_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
