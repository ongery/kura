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
        Schema::table('consequence_matrix_rank', function (Blueprint $table) {
            $table->string('location')->nullable()->after('o_i_t_m_id');
        });
    }

    public function down()
    {
        Schema::table('consequence_matrix_rank', function (Blueprint $table) {
            $table->dropColumn(['location']);
        });
    }
};
