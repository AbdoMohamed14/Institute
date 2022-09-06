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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ar');
            $table->text('disc');
            $table->text('disc_ar');
            $table->string('logo');
            $table->string('num');
            $table->string('place');
            $table->string('place_ar');
            $table->string('email');
            $table->string('facebook');
            $table->string('youtube');
            $table->string('home_video');
            $table->string('twitter');
            $table->string('avatar');
            $table->string('back');
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
        Schema::dropIfExists('settings');
    }
};
