<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_rows', function (Blueprint $table) {
            $table->id();
            $table->integer('ObjType')->nullable();
            $table->integer('DocNum');
            $table->integer('DocEntry')->references('id')->on('notifications')->nullable();
            $table->integer('user_id')->references('id')->on('users')->nullable(); //Users
            $table->text('Description')->nullable();
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
        Schema::dropIfExists('notification_rows');
    }
}
