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
        Schema::create('self_assessment_questionnaire_result', function (Blueprint $table) {
            $table->id();
            $table->integer('questionnaire_id')->nullable();
            $table->date('date_send')->nullable();
            $table->string('questionnaire_status')->nullable();
            $table->string('review_status')->nullable();
            $table->string('last_comment')->nullable();
            $table->string('company')->nullable();
            $table->string('contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('self_assessment_questionnaire_result');
    }
};
