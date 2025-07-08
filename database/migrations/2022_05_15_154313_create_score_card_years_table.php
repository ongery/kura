<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreCardYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_card_years', function (Blueprint $table) {
            $table->id();
            $table->integer('scorecard_id')
                ->references('id')->on('score_cards')->nullable();
            $table->integer('year');
            $table->string('BaseLineValue');
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
        Schema::dropIfExists('score_card_years');
    }
}
