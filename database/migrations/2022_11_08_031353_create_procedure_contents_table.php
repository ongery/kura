<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedure_contents', function (Blueprint $table) {
            $table->id();
            $table->string('Name')->nullable();
            $table->integer('DocNum');
            $table->integer('withListOfItems')->default(0)->comment("0=No, 1=Yes");
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
        Schema::dropIfExists('procedure_contents');
    }
};
