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
        Schema::create('action_milestones', function (Blueprint $table) {
            $table->id();
            $table->integer('action_id')->index()->nullable();
            $table->string('milestone_name',200)->nullable();
            $table->date('due_date')->nullable();
            $table->integer('status')->index()->default(0)->comment('0 - Not Started, 1 - WIP (On Course), 2 - WIP (Overdue), 3 - Not Started (Overdue), 4 - Deferred, 5 - Completed');
            $table->integer('progress')->default(0);
            $table->boolean('is_milestone')->default(false);
            $table->timestamps();
        });

        Schema::table('action_trackings', function (Blueprint $table) {
            $table->dropColumn(['milestone_due_date', 'milestone_status', 'progress', 'is_milestone']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('action_milestones');
        
        Schema::table('action_trackings', function (Blueprint $table) {
            $table->date('milestone_due_date')->nullable();
            $table->enum('milestone_status', ['Pending', 'WIP on course', 'WIP overdue', 'Completed'])->default('Pending');
            $table->integer('progress')->default(0);
            $table->boolean('is_milestone')->default(false);
        });
    }
};
