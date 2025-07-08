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
        Schema::create('n_c_r_s', function (Blueprint $table) {
            $table->id();
            $table->integer('BunitID')
                ->references('id')->on('b_u_n_i_t_s')->nullable();
            $table->string('DocNum')->nullable();
            $table->string('AuditDate')->nullable();
            $table->string('AuditNo')->nullable();
            $table->string('AreaUnderReview')->nullable();
            $table->string('Requirement')->nullable();
            $table->string('ClauseOfCriteriaDocument')->nullable();
            $table->string('NonConformity')->nullable();
            $table->string('Category')->nullable();
            $table->string('RootCauses')->nullable();
            $table->string('Correction')->nullable();
            $table->integer('UserSign')->nullable();
            $table->integer('CreatedBy')->nullable();
            $table->string('ActionToBeTaken')->nullable();
            $table->integer('ActionStatus')->nullable();
            $table->text('EvidencePath')->nullable();
            $table->integer('EffectivenessOfCorrectiveAction')->default(0);
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
        Schema::dropIfExists('n_c_r_s');
    }
};
