<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('action_trackings', function (Blueprint $table) {
            $table->date('milestone_due_date')->nullable();
            $table->enum('milestone_status', ['Pending', 'WIP on course', 'WIP overdue', 'Completed'])->default('Pending');
            $table->integer('progress')->default(0);
            $table->boolean('is_milestone')->default(false);
        });
    }

    public function down()
    {
        Schema::table('action_trackings', function (Blueprint $table) {
            $table->dropColumn(['milestone_due_date', 'milestone_status', 'progress', 'is_milestone']);
        });
    }
};
