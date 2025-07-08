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
        Schema::create('self_assessments_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('self_assessments_questions_id')->constrained('self_assessments_questions')->onDelete('cascade');
            $table->foreignId('answer_id')->nullable()->constrained('assessment_answers')->onDelete('cascade');
            $table->text('answer_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('self_assessments_answers');
    }
};
