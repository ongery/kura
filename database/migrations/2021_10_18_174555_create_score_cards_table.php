<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_cards', function (Blueprint $table) {
            $table->id();
            $table->MediumText('Target')->nullable();
            $table->MediumText('measure')->nullable();
            $table->string('monitoring')->nullable();
            $table->string('priority')->nullable();
            $table->MediumText('indicator')->nullable();
            $table->integer('UserSign')->references('id')->on('users')->comment("Created y")->nullable(); //Created By
            $table->integer('pillar')->references('id')->on('profile_data')->nullable();
            $table->integer('objective')->references('id')->on('profile_data')->nullable();
            $table->string('Frequency', 1)->nullable();
            $table->integer('BunitID')
                ->references('id')->on('b_u_n_i_t_s')->nullable();
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
        Schema::dropIfExists('score_cards');
    }
}
