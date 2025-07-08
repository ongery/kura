<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsequenceMatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consequence_matrices', function (Blueprint $table) {
            $table->id();
            $table->text('ImpactMeasure')->nullable();
            $table->text('Fundamental')->nullable();
            $table->text('Major')->nullable();
            $table->text('Moderate')->nullable();
            $table->text('Minor')->nullable();
            $table->text('Insignificant')->nullable();

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
        Schema::dropIfExists('consequence_matrices');
    }
}
