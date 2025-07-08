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
        Schema::create('procedure_rows', function (Blueprint $table) {
            $table->id();
            $table->integer('content_id')->references('id')->on('procedure_contents')->nullable(); //contents
            $table->integer('procedure_id')->references('id')->on('procedures')->nullable(); //procedures
            $table->integer('position')->default(1);
            $table->text('Description')->nullable();
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
        Schema::dropIfExists('procedure_rows');
    }
};
