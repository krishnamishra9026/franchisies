<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeoContentToHomePageSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            // if not exist, add the new column
            if (!Schema::hasColumn('home_page_settings', 'seo_content')) {
                $table->longText('seo_content')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->dropColumn('seo_content');
        });
    }
}
