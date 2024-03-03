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
        Schema::create('creators', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullable();
            $table->string('phyllo_user_id')->nullable();
            $table->longText('phyllo_token')->nullable();
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('gender')->nullable();
            $table->text('bio')->nullable();
            $table->text('address')->nullable();
            $table->text('badge_ids')->nullable();
            $table->text('address1')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('talent_title')->nullable();
            $table->text('talent_description')->nullable();
            $table->text('showcase_example')->nullable();
            $table->string('content_type')->nullable();
            $table->string('category')->nullable();
            $table->string('tag')->nullable();
            $table->string('alt_phone_number')->nullable();
            $table->integer('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->bigInteger('instagram')->default(0)->nullable();
            $table->bigInteger('youtube')->default(0)->nullable();
            $table->bigInteger('tiktok')->default(0)->nullable();
            $table->double('avg_rating')->default(0)->nullable();
            $table->double('price')->default(0)->nullable();
            $table->integer('instagram_connected')->default(0)->nullable();
            $table->integer('youtube_connected')->default(0)->nullable();
            $table->integer('tiktok_connected')->default(0)->nullable();
            $table->bigInteger('instagram_subscribers_or_followers')->default(0)->nullable();
            $table->bigInteger('youtube_subscribers_or_followers')->default(0)->nullable();
            $table->bigInteger('tiktok_subscribers_or_followers')->default(0)->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('featured')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creators');
    }
};
