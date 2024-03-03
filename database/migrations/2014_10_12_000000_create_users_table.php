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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone_number')->nullable();
            $table->string('alt_phone_number')->nullable();
            $table->string('avatar')->nullable();
            $table->text('address')->nullable();
            $table->text('badge_ids')->nullable();
            $table->text('address1')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->boolean('status')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
