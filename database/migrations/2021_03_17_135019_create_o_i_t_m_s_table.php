<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOITMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o_i_t_m_s', function (Blueprint $table) {
            $table->id();
            $table->integer('BunitID')
                ->references('id')->on('b_u_n_i_t_s')->nullable();
            $table->integer('parent_id')
                ->references('id')->on('o_i_t_m_s')->nullable();
            $table->integer('o_r_i_s_k_id')->references('id')->on('o_r_i_s_k_s')->nullable(); //Risks
            $table->string('DocNum', 100)->nullable();
            $table->string('ObjType')->default(15);
            $table->text('Name')->nullable();
            $table->integer('CategoryID')->references('id')->on('categories')->nullable(); //Category
            $table->integer('RiskLevelID')->nullable()->comment("1-Risk Management, 2-Main Risk Events"); //Category
            $table->text('description')->nullable();
            $table->string('file_path')->nullable();
            $table->integer('UserSign')->references('id')->on('users')->comment("Created y")->nullable(); //Created By
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
        Schema::dropIfExists('o_i_t_m_s');
    }
}
