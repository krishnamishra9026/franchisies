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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('user_type')->nullable();
            $table->string('form_type')->nullable();
            $table->string('email')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('available_slot')->nullable();
            $table->string('category')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->text('query')->nullable();
            $table->string('brandagreement')->nullable();
            $table->string('business_experience')->nullable();
            $table->string('investment_range')->nullable();
            $table->string('associate_time')->nullable();
            $table->string('how_to_know_me')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
