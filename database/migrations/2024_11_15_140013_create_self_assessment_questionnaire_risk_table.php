<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('self_assessment_questionnaire_risk', function (Blueprint $table) {
            $table->id();
            $table->integer('questionnaire_id')->nullable();
            $table->string('project_name',200)->nullable();
            $table->string('site_location',150)->nullable();
            $table->string('affected_assets',150)->nullable();
            $table->string('team',150)->nullable();
            $table->string('addi_stakeholders',150)->nullable();
            $table->string('owner',150)->nullable();
            $table->string('owners_manager',150)->nullable();
            $table->text('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('self_assessment_questionnaire_risk');
    }
};
