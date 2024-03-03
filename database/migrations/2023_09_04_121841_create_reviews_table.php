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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('author')->nullable();
            $table->string('user_type')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('sponsor_id')->nullable();
            $table->string('subject')->nullable();
            $table->longText('review')->nullable();
            $table->integer('rating')->default(0)->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
