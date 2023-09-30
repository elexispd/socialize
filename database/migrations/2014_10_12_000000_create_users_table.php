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
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('username', 50)->unique();
            $table->string('phone_number', 20)->unique()->nullable();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('gender', 15)->nullable();
            $table->string('relationship', 30)->nullable();
            $table->string('education', 250)->nullable();
            $table->string('location', 255)->nullable();
            $table->string('about')->nullable();
            $table->date('birthday')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_online');
            $table->timestamp('last_seen')->nullable();
            $table->boolean('status');
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
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('users');
    }
};
