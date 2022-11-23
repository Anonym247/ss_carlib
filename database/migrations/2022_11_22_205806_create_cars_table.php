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
    public function up(): void
    {
        Schema::create('cars', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('photo');
            $table->unsignedSmallInteger('year');
            $table->string('state_number', 50);
            $table->string('color', 50);
            $table->enum('transmission', ['auto', 'manual']);
            $table->unsignedFloat('rental_price_per_day');
            $table->timestamps();

            $table->foreign('model_id')->references('id')->on('models');
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
