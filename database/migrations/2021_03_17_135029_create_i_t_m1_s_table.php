<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateITM1STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_t_m1_s', function (Blueprint $table) {
            $table->id();
            $table->integer('Base')->default();
            $table->string('Name')->nullable();
            $table->integer('o_i_t_m_id')->references('id')->on('o_i_t_m_s')->nullable(); //Risks
            $table->integer('ScaleID')->references('id')->on('consequence_scales')->nullable(); //Risks
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
        Schema::dropIfExists('i_t_m1_s');
    }
}
