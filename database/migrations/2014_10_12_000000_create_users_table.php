<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username')->unique();
            $table->string('phone_number')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender')->nullable();
            $table->string('relationship')->nullable();
            $table->string('location')->nullable();
            $table->string('about')->nullable();
            $table->date('birthday');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_online');
            $table->timestamp('last_seen')->nullable();
            $table->date('status');
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
};
