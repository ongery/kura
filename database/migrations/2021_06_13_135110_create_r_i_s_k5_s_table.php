<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRISK5STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_i_s_k5_s', function (Blueprint $table) {
            $table->id();
            $table->integer('ObjType')->nullable();
            $table->integer('o_r_i_s_k_id')->references('id')->on('o_r_i_s_k_s')->nullable(); //Risks
            $table->integer('parent')->references('id')->on('o_r_i_s_k_s')->nullable(); //Risks
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
        Schema::dropIfExists('r_i_s_k5_s');
    }
}
