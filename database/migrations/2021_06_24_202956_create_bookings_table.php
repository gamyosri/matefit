<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainer_id');
            $table->unsignedBigInteger('mate_id');
            $table->string('title');
            $table->string('description');
            $table->string('location');
            $table->string('status')->default('pending');
            $table->integer('maxppl');
            $table->integer('price');
            $table->timestamp('time');
            $table->timestamps();
            $table->foreign('trainer_id')
                ->references('id')
                ->on('users')
                ->onCascade('delete');
            $table->foreign('mate_id')
                ->references('id')
                ->on('users')
                ->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
