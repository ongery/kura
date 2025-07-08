<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateONNMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o_n_n_m_s', function (Blueprint $table) {
            $table->id();
            $table->integer('ObjType');
            $table->string('SeriesName', 20)->nullable();
            $table->integer('InitialNum')->nullable();
            $table->integer('NextNumber')->nullable();
            $table->integer('LastNum')->nullable();
            $table->string('BeginStr', 20)->nullable();
            $table->string('EndStr', 20)->nullable();
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
        Schema::dropIfExists('o_n_n_m_s');
    }
}
