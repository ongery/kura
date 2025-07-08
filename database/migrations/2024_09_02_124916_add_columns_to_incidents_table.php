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
        Schema::table('incidents', function (Blueprint $table) {
            $table->string('communications')->nullable()->after('BunitID');
            $table->string('facilities')->nullable()->after('communications');
            $table->string('hardware')->nullable()->after('facilities');
            $table->string('software')->nullable()->after('hardware');
            $table->string('resource')->nullable()->after('software');
            $table->string('occurrence_type')->nullable()->after('Description');
            $table->string('direction')->nullable()->after('occurrence_type');
            $table->string('attack_vector')->nullable()->after('direction');
            $table->string('detected_by')->nullable()->after('attack_vector');            
            $table->string('reported_by')->nullable()->after('detected_by');
            $table->string('owned_by')->nullable()->after('reported_by');
            $table->string('additional_stakeholders')->nullable()->after('owned_by');
            $table->string('teams')->nullable()->after('additional_stakeholders');
            $table->string('functional_impact')->nullable()->after('teams');
            $table->string('information_impact')->nullable()->after('functional_impact');
            $table->string('recovery')->nullable()->after('information_impact');
            $table->integer('priority')->default(0)->after('recovery');
            $table->string('regions')->nullable()->after('priority');
            $table->string('countries')->nullable()->after('regions');
            $table->string('cities')->nullable()->after('countries');
            $table->string('related_incidents')->nullable()->after('cities');
            $table->string('related_risks')->nullable()->after('related_incidents');
            $table->string('affected_assets')->nullable()->after('related_risks');
            $table->string('source_tags')->nullable()->after('affected_assets');
            $table->string('destination_tags')->nullable()->after('source_tags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('incidents', function (Blueprint $table) {
            $table->dropColumn(['communications','facilities','hardware','software','resource','occurrence_type','direction','attack_vector','detected_by','reported_by','owned_by','additional_stakeholders','teams','functional_impact','information_impact','recovery','priority','regions','countries','cities','related_incidents','related_risks','affected_assets','source_tags','destination_tags']);
        });
    }
};
