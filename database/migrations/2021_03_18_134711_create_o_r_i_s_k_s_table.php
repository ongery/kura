<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateORISKSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o_r_i_s_k_s', function (Blueprint $table) {
            $table->id();
            $table->string('DocNum', 100)->nullable();
            $table->integer('o_i_t_m_id')->references('id')->on('o_i_t_m_s')->nullable()->comment("Risk Event ID");
            $table->string('Name')->nullable();
            $table->integer('ObjType')->nullable();
            $table->integer('Status')->default(0)->comment("0=UnApproved, 1=Approved");
            $table->integer('UserSign')->references('id')->on('users')->comment("Created y")->nullable(); //Created By
            $table->foreignId('user_id')->nullable()->constrained(); // Approved By
            $table->date('DateIdentified')->nullable(); // Date Identified
            $table->integer('o_r_i_s_k_id')
                ->references('id')->on('o_r_i_s_k_s')->nullable();
            $table->integer('BunitID')
                ->references('id')->on('b_u_n_i_t_s')->nullable();
            $table->text('RiskCauseDescription')->nullable();
            $table->text('RiskEffectsDescription')->nullable();
            //For Analyasis
            $table->integer('InherentLikelihoodScale')
                ->references('id')->on('likelihood_scales')->nullable();
            $table->integer('ApproachforRiskAssesment')->nullable();
            $table->integer('ResidualLikelihoodScale')
                ->references('id')->on('likelihood_scales')->nullable();
            $table->integer('ResidualConsequenceScale')
                ->references('id')->on('consequence_scales')->nullable();

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
        Schema::dropIfExists('o_r_i_s_k_s');
    }
}
