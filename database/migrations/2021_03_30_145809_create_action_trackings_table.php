<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_trackings', function (Blueprint $table) {
            $table->id();
            $table->integer('BunitID')
                ->references('id')->on('b_u_n_i_t_s')->nullable();
            $table->integer('o_r_i_s_k_id')->references('id')->on('o_r_i_s_k_s')->nullable(); //Risks
            $table->integer('o_k_r_i_id')->references('id')->on('o_k_r_i_s')->nullable(); //KRIS
            $table->integer('o_i_t_m_id')->references('id')->on('o_i_t_m_s')->nullable(); //Procedures
            $table->integer('user_id')->references('id')->on('users')->nullable(); //Users
            $table->integer('parent_id')->references('id')->on('action_trackings')->nullable(); //KRIS
            $table->string('DocNum', 100)->nullable();
            $table->string('ObjType')->nullable();
            $table->string('Source')->nullable();
            $table->string('Category')->nullable();
            $table->string('DueDate')->nullable();
            $table->integer('Status')->nullable();
            $table->string('Name')->nullable();
            $table->string('Description')->nullable();
            $table->integer('isForKRI')->default(0)->comment("0=No, 1=Yes");
            $table->string('Rating')->nullable();
            $table->integer('UserSign')->references('id')->on('users')->comment("Created y")->nullable(); //Created By
            $table->integer('Budget')->default(0);
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
        Schema::dropIfExists('action_trackings');
    }
}
