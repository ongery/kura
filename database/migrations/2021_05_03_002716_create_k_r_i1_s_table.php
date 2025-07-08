<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKRI1STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('k_r_i1_s', function (Blueprint $table) {
            $table->id();
            $table->integer('o_k_r_i_id')->references('id')->on('o_k_r_i_s')->nullable(); //action_trackings
            $table->integer('user_id')->references('id')->on('users')->nullable(); //Users
            $table->float('Value')->nullable();
            $table->text('desc')->nullable();
            $table->integer('Status')->default(0)->comment("0=InActive, 1=Active");
            $table->integer('isShow')->default(0)->comment("0=InActive, 1=Active");
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
        Schema::dropIfExists('k_r_i1_s');
    }
}
