<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOKRISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o_k_r_i_s', function (Blueprint $table) {
            $table->id();
            $table->string('DocNum', 100)->nullable();
            $table->integer('ObjType')->nullable();
            $table->integer('o_i_t_m_id')->references('id')->on('o_i_t_m_s')->nullable(); //Risks Events
            $table->integer('CategoryID')->nullable();
            $table->string('Name')->nullable();
            $table->text('description')->nullable();
            $table->float('Weight')->nullable();
            $table->string('Frequency', 1)->nullable();
            $table->date('StartDate')->nullable();
            $table->date('ExpiredDate')->nullable();
            $table->integer('DataType')->nullable()->comment('1=Numbers, 2=%');
            $table->float('LowerLimit')->nullable();
            $table->float('GreenAmber')->nullable();
            $table->float('AmberRed')->nullable();
            $table->float('UpperLimit')->nullable();
            $table->integer('Status')->default(0)->comment("0=Not, 1=Approved");
            $table->integer('isActive')->default(1)->comment("0=InActive, 1=Active");
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
        Schema::dropIfExists('o_k_r_i_s');
    }
}
