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
        Schema::table('o_r_i_s_k_s', function (Blueprint $table) {
            $table->string('threat_mapping')->nullable();
            $table->string('risk_mapping')->nullable();
            $table->string('risk_source')->nullable();
            $table->string('category')->nullable();
            $table->string('site_location')->nullable();
            $table->string('external_reference_id')->nullable();
            $table->string('control_regulation')->nullable();
            $table->string('control_number')->nullable();
            $table->string('affected_assets')->nullable();
            $table->string('technology')->nullable();
            $table->string('team')->nullable();
            $table->string('add_stockholders')->nullable();
            $table->string('owners_manager')->nullable();
            $table->string('supporting_document')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('o_r_i_s_k_s', function (Blueprint $table) {
            $table->dropColumn([
                'threat_mapping',
                'risk_mapping',
                'risk_source',
                'category',
                'site_location',
                'external_reference_id',
                'control_regulation',
                'control_number',
                'affected_assets',
                'technology',
                'team',
                'add_stockholders',
                'owners_manager',
                'supporting_document',
            ]);
        });
    }
};
