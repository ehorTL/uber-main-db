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
            $table->string('id', 32)->unique();
            $table->timestamps();

            $table->string('car_id', 28)->nullable();
            $table->string('rider_id', 28)->nullable();

            $table->timestamp('ride_from_timestamp')->nullable();
            $table->timestamp('ride_to_timestamp')->nullable();

            $table->string('address_from')->nullable();
            $table->string('address_to')->nullable();

            // $table->decimal('from_coord_latitude', 10, 6)->nullable();
            // $table->decimal('from_coord_longitude', 10, 6)->nullable();
            // $table->decimal('to_coord_latitude', 10, 6)->nullable();
            // $table->decimal('to_coord_longitude', 10, 6)->nullable();
            // $table->decimal('cost', 20, 2)->nullable()->default(0.0);

            $table->double('from_coord_latitude', 20, 10)->nullable();
            $table->double('from_coord_longitude', 20, 10)->nullable();
            $table->double('to_coord_latitude', 20, 10)->nullable();
            $table->double('to_coord_longitude', 20, 10)->nullable();
            $table->double('cost', 20, 10)->nullable()->default(0.0);
            $table->double('distance', 20, 10)->nullable();
            // could be a foreign key from another table
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
