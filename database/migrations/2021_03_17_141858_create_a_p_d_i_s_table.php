<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAPDISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_p_d_i_s', function (Blueprint $table) {
            $table->id();
            $table->integer('ObjType')->unique();
            $table->string('ObjectHeaderTable')->nullable();
            $table->string('DocumentName')->nullable();
            $table->string('PermissionName')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a_p_d_i_s');
    }
}
