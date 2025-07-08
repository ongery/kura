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
        Schema::create('self_accessement_assignments', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->integer('category_id')->references('id')->on('self_accessement_categories')->nullable(); //procedures
            $table->integer('user_id')->references('id')->on('users')->nullable(); //Users
            $table->integer('period_id')->references('id')->on('periods')->nullable(); //Users
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
        Schema::dropIfExists('self_accessement_assignments');
    }
};
