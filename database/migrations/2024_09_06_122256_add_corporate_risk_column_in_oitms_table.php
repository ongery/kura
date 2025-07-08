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
        Schema::table('o_i_t_m_s', function (Blueprint $table) {
            $table->integer('CorporateRiskID')->nullable()->index()->after('CategoryID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('o_i_t_m_s', function (Blueprint $table) {
            $table->dropColumn('CorporateRiskID');
        });
    }
};
