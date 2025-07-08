<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRISK4STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_i_s_k4_s', function (Blueprint $table) {
            $table->id();
            $table->integer('action_tracking_id')->references('id')->on('action_trackings')->nullable(); //action_trackings
            $table->integer('ObjType')->nullable(); //Parent Object
            $table->integer('user_id')->references('id')->on('users')->nullable(); //Risks
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
        Schema::dropIfExists('r_i_s_k4_s');
    }
}
