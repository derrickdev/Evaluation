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
        Schema::create('gest_users', function (Blueprint $table) {
        $table->id();
        $table-> string('gender');
        $table->string('title');
        $table->string('first');
        $table->string('last');
        $table->string('location');
        $table->string('city');
        $table->string('state');
        $table->string('country');
        $table->integer('postcode');
        $table->enum('coordinates',["latitude,longitude"]);
        $table->enum('timezone',["offset,description"]);
        $table->string('email');
        $table->enum('login',["uuid,username,password"]);
        $table->enum('registered',["date, age"]);
        $table->integer('phone'); 
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gest_users');
    }
};
