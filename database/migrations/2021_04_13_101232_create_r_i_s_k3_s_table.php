<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRISK3STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_i_s_k3_s', function (Blueprint $table) {
            $table->id();
            $table->integer('ObjType')->nullable();
            $table->integer('action_tracking_id')->references('id')->on('action_trackings')->nullable(); //action_trackings
            $table->integer('o_i_t_m_id')->references('id')->on('o_i_t_m_s')->nullable(); //Risks
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
        Schema::dropIfExists('r_i_s_k3_s');
    }
}
