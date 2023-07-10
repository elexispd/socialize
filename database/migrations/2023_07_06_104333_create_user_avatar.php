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
        Schema::create('users_avatar', function (Blueprint $table) {
            $table->id();
            $table->string("username")->unique();
            $table->string("profile_photo_name")->unique();
            $table->string("profile_photo_path");
            $table->string("featured_photo_name")->unique();
            $table->string("featured_photo_path");
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
        Schema::dropIfExists('users_avatar');
    }
};
