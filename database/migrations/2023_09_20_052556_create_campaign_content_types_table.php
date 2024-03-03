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
        Schema::create('campaign_content_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('content_type_id')->unsigned();
            $table->unsignedBiginteger('campaign_id')->unsigned();
            $table->foreign('content_type_id')->references('id')->on('content_types')->onDelete('cascade');
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_content_types');
    }
};
