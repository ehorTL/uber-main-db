<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->string('id', 36)->unique();
            $table->timestamps();

            $table->string('car_id', 36)->nullable();
            $table->string('rider_id', 36)->nullable();

            $table->string('address_from')->nullable();
            $table->string('address_to')->nullable();

            $table->float('from_coord_latitude')->nullable();
            $table->float('from_coord_longitude')->nullable();
            $table->float('to_coord_latitude')->nullable();
            $table->float('to_coord_longitude')->nullable();

            $table->float('price')->nullable()->default(0.0);
            $table->float('distance')->nullable();
            // $table->timestamp('ride_from_timestamp')->nullable();
            // $table->timestamp('ride_to_timestamp')->nullable();
            $table->string('ride_from_timestamp')->nullable();
            $table->string('ride_to_timestamp')->nullable();

            $table->string('status')->nullable();

            $table->foreign('rider_id')->references('id')->on('riders')->onDelete('set null');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
