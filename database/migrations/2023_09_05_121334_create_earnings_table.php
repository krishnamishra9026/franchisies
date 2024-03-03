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
        Schema::create('earnings', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->double('amount')->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->text('transaction_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->text('badges')->nullable();
            $table->enum('user_type',['Sponsor','Creator'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('earnings');
    }
};
