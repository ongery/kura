<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Fname')->nullable();
            $table->string('Lname')->nullable();
            $table->string('Mobile')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('BunitID')->references('id')->on('b_u_n_i_t_s')->nullable();
            $table->integer('Position')->default(0)->comment("0:Kura User, 1:Risk Company User");
            $table->string('password');
            $table->timestamp('trial_until')->nullable();
            $table->integer('TwoFA')->default(1);
            $table->integer('Ttype')->default(0)->comment("0=Normal User,1=Admin, 2=Super Admin");
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
