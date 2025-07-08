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
        Schema::create('self_assessment_questionnaire', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->nullable();
            $table->text('instruction')->nullable();
            $table->enum('automatic_send',['0','1'])->default('0')->comment('0 - unchecked, 1 - checked');
            $table->integer('notify_assessment')->nullable();
            $table->integer('schedule_send')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('self_assessment_questionnaire');
    }
};
