<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBUNITSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_u_n_i_t_s', function (Blueprint $table) {
            $table->id();
            $table->integer('ObjType')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('Name');
            $table->string('Acronym');
            $table->integer('Manager')->references('id')->on('users')->nullable(); //Manager
            $table->integer('UserSign1')->references('id')->on('users')->nullable(); //Risk Champion 1
            $table->integer('UserSign2')->references('id')->on('users')->nullable(); //Risk Champion 2
            $table->integer('UserSign3')->references('id')->on('users')->nullable(); //Risk Champion 3
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
        Schema::dropIfExists('b_u_n_i_t_s');
    }
}
