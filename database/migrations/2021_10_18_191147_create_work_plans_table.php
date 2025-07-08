<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_plans', function (Blueprint $table) {
            $table->id();
            $table->string('Activity');
            $table->Date('StartDate');
            $table->Date('EndDate');
            $table->string('Output');
            $table->string('ActualOutput')->default(0);
            $table->string('Budget');
            $table->integer('Status');
            $table->integer('scorecard_id')
                ->references('id')->on('score_cards')->nullable();
            $table->integer('BunitID')
                ->references('id')->on('b_u_n_i_t_s')->nullable();
            $table->integer('UserSign')->references('id')->on('users')->comment("User Responsible")->nullable();
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
        Schema::dropIfExists('work_plans');
    }
}
