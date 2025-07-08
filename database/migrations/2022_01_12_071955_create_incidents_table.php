<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->integer('BunitID')
                ->references('id')->on('b_u_n_i_t_s')->nullable();
            $table->date('IncidentDate')->nullable();
            $table->date('IncidentReportOn')->nullable();
            $table->text('Title')->nullable();
            $table->text('Description')->nullable();
            $table->integer('Status')->default(0)->comment("0=Not Reviewed, 1=Reviewed");
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
        Schema::dropIfExists('incidents');
    }
}
