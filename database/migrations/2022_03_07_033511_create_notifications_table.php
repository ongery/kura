<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->references('id')->on('users')->nullable(); //Users
            $table->integer('UserSign')->references('id')->on('users')->comment("Created y")->nullable(); //Created By
            $table->text('Subject')->nullable();
            $table->integer('isSend')->default(0)->comment("0=No, 1=Yes");
            $table->integer('isRead')->default(0)->comment("0=No, 1=Yes");
            $table->integer('type')->default(0)->comment("0=Single, 1=Batch");
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
        Schema::dropIfExists('notifications');
    }
}
