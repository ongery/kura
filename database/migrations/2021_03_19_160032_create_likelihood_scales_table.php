<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikelihoodScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likelihood_scales', function (Blueprint $table) {
            $table->id();
            $table->string('Name')->nullable();
            $table->integer('Base')->default();
            $table->string('IndicateFrequency')->nullable();
            $table->string('IndicateProbability')->nullable();
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
        Schema::dropIfExists('likelihood_scales');
    }
}
