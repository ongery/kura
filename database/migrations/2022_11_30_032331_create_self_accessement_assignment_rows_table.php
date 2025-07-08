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
        Schema::create('self_accessement_assignment_rows', function (Blueprint $table) {
            $table->id();
            $table->integer('assignment_id')->references('id')->on('self_accessement_categories')->nullable(); //procedures
            $table->integer('question_id')->references('id')->on('self_accessement_categories')->nullable(); //procedures
            $table->integer('answer')->default(0); //Users
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
        Schema::dropIfExists('self_accessement_assignment_rows');
    }
};
