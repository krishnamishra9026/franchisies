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
        Schema::create('creator_pricings', function (Blueprint $table) {
            $table->id();
            $table->integer('creator_id');
            $table->string('service_detail')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('social_platform')->nullable();
            $table->double('price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creator_pricings');
    }
};
