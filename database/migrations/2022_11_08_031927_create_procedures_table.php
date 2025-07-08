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
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();
            $table->integer('BunitID')
                ->references('id')->on('b_u_n_i_t_s')->nullable();
            $table->string('title')->nullable();
            $table->string('DocNum')->nullable();
            $table->string('Subject')->nullable();
            $table->string('DocDate')->nullable();
            $table->text('Purpose')->nullable();
            $table->text('Scope')->nullable();
            $table->text('PrincipalResponsibility')->nullable();
            $table->text('Diagram')->nullable();
            $table->integer('approvalStage')->default(-1)->comments("-1=Draft,0=Not Approved, 1=Approved By HOD, 2=Approved By Organization leader");
            $table->integer('user_id')->references('id')->on('users')->nullable(); //owner
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
        Schema::dropIfExists('procedures');
    }
};
