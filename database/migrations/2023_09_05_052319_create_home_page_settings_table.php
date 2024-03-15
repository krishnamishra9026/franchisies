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
        Schema::create('home_page_settings', function (Blueprint $table) {
            $table->id();

            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('page_title')->nullable();

            $table->string('works_title1')->nullable();
            $table->string('works_description1')->nullable();
            $table->string('works_image1')->nullable();
            $table->string('works_title2')->nullable();
            $table->string('works_description2')->nullable();
            $table->string('works_image2')->nullable();
            $table->string('works_title3')->nullable();
            $table->string('works_description3')->nullable();
            $table->string('works_image3')->nullable();
            $table->string('works_title4')->nullable();
            $table->string('works_description4')->nullable();
            $table->string('works_image4')->nullable();


            $table->string('title1')->nullable();
            $table->string('description1')->nullable();
            $table->string('image')->nullable();
            $table->string('title2')->nullable();
            $table->string('description2')->nullable();
            $table->string('title3')->nullable();
            $table->string('description3')->nullable();
            $table->string('title4')->nullable();
            $table->string('description4')->nullable();

            $table->string('banner1_title')->nullable();
            $table->string('banner1_button_text')->nullable();
            $table->string('banner1_button_bg_color')->nullable();
            $table->string('banner1_button_text_color')->nullable();
            $table->string('banner1_image')->nullable();

            $table->string('banner2_title')->nullable();
            $table->string('banner2_description')->nullable();
            $table->string('banner2_button_text')->nullable();
            $table->string('banner2_button_bg_color')->nullable();
            $table->string('banner2_button_text_color')->nullable();
            $table->string('banner2_image')->nullable();

            $table->string('banner_title')->nullable();
            $table->string('search_placeholder')->nullable();
            $table->string('search_button_background')->nullable();
            $table->string('background_image')->nullable();
            $table->string('mobile_background_image')->nullable();
            
            $table->string('modal_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_settings');
    }
};
