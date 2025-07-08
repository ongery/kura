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
        Schema::table('action_milestones', function (Blueprint $table) {
            $table->string('attachment', 200)->nullable()->after('is_milestone'); // Add the attachment column
        });
    }

    public function down()
    {
        Schema::table('action_milestones', function (Blueprint $table) {
            $table->dropColumn('attachment');
        });
    }
};
