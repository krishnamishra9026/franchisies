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
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('chat_id');
            $table->bigInteger('user_id');
            $table->integer('flex')->nullable();
            $table->string('sender_reseptent')->nullable();
            $table->bigInteger('message_from')->nullable();
            $table->bigInteger('message_to')->nullable();
            $table->string('sender')->nullable();
            $table->string('file')->nullable();
            $table->integer('seen')->default(0)->nullable();
            $table->string('receiver')->nullable();
            $table->longText('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
    }
};
