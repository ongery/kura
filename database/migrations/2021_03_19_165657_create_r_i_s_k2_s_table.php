<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRISK2STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_i_s_k2_s', function (Blueprint $table) {
            $table->id();
            $table->integer('ObjType')->nullable()->comment("24=Inherent Consequence Scale, 25=Residualt Consequence Scale");
            $table->integer('o_r_i_s_k_id')->references('id')->on('o_r_i_s_k_s')->nullable(); //Risks
            $table->integer('o_i_t_m_id')->references('id')->on('o_i_t_m_s')->nullable(); //Risks
            $table->integer('i_t_m_1_id')->references('id')->on('i_t_m1_s')->nullable(); //Risks
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
        Schema::dropIfExists('r_i_s_k2_s');
    }
}
