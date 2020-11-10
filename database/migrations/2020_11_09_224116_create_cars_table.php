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
            $table->id();
            $table->timestamps();

            $table->tinyInteger('capacity');
            $table->boolean('accepts_rides');
            $table->boolean('on_the_ride');
            $table->unsignedBigInteger('car_class_id');
            $table->unsignedBigInteger('car_status_id')->nullable();

            $table->decimal('coord_latitude', 10, 6);
            $table->decimal('coord_longitude', 10, 6);
        });

        Schema::table('cars', function (Blueprint $table) {
            // onDelete('RESTRIC') by default
            $table->foreign('car_class_id')->references('id')->on('car_classes');
            $table->foreign('car_status_id')->references('id')->on('car_statuses');
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
