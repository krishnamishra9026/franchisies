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
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('valid_from_date')->nullable();
            $table->string('valid_to_date')->nullable();
            $table->integer('no_of_uses')->nullable();
            $table->integer('used')->nullable();
            $table->enum('type',['fixed','percent']);
            $table->decimal('value');
            $table->boolean('status')->default(true)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_codes');
    }
};
