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
        Schema::create('self_assessment_questionnaire_templates', function (Blueprint $table) {
            $table->id();
            $table->integer('questionnaire_id')->nullable();
            $table->integer('template_id')->nullable();
            $table->integer('assessment_contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('self_assessment_questionnaire_templates');
    }
};
