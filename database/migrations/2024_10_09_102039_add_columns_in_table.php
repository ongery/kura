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
        Schema::table('consequence_matrix_rank', function (Blueprint $table) {
            $table->integer('o_i_t_m_id')->index()->nullable()->after('id');
            $table->integer('scalesGroupId')->index()->nullable()->after('o_i_t_m_id');
            $table->integer('groupType')->index()->nullable()->comment('1 - Inherent Risk Level, 2 - Residual Risk Level')->after('scalesGroupId');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consequence_matrix_rank', function (Blueprint $table) {
            $table->dropColumn(['scalesGroupId', 'groupType']);
        });
    }
};
