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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->integer('category')->nullable();
            $table->string('brandname')->nullable();
            $table->string('brandurl')->nullable();
            $table->string('brandtype')->nullable();
            $table->string('established')->nullable();
            $table->string('bdescr')->nullable();
            $table->string('brandstarted')->nullable();
            $table->string('investment')->nullable();
            $table->string('space_req')->nullable();
            $table->string('boutlats')->nullable();
            $table->string('prange')->nullable();
            $table->string('memberofbrand')->nullable();
            $table->string('brandnumber')->nullable();
            $table->string('state')->nullable();
            $table->string('singleunit')->nullable();
            $table->string('brandfee')->nullable();
            $table->string('equipments')->nullable();
            $table->string('furniture')->nullable();
            $table->string('advertising')->nullable();
            $table->string('paybackp')->nullable();
            $table->string('anyotherinvi')->nullable();
            $table->string('lookexpansion')->nullable();
            $table->string('returnoninv')->nullable();
            $table->string('reqproperty')->nullable();
            $table->string('floorarea')->nullable();
            $table->string('locationbrand')->nullable();
            $table->string('officestaff')->nullable();
            $table->string('comsyatem')->nullable();
            $table->string('internetreq')->nullable();
            $table->string('fieldassis')->nullable();
            $table->string('trainingprogm')->nullable();
            $table->string('opermanual')->nullable();
            $table->string('needit')->nullable();
            $table->string('headofficeassis')->nullable();
            $table->string('website')->nullable();
            $table->string('brandterm')->nullable();
            $table->string('proirity')->nullable();
            $table->enum('brandagreement', ['Yes', 'No'])->default('No')->nullable();
            $table->enum('busiopertunity', ['Yes', 'No'])->default('No')->nullable();
            $table->enum('whatsnew', ['Yes', 'No'])->default('No')->nullable();
            $table->enum('brandopon', ['Yes', 'No'])->default('No')->nullable();
            $table->enum('brandhomepage', ['Yes', 'No'])->default('No')->nullable();
            $table->enum('toplogo', ['Yes', 'No'])->default('No')->nullable();
            $table->enum('popubrand', ['Yes', 'No'])->default('No')->nullable();
            $table->enum('ispremium', ['Yes', 'No'])->default('No')->nullable();
            $table->enum('isnewarrival', ['Yes', 'No'])->default('No')->nullable();
            $table->enum('ispremiumtop', ['Yes', 'No'])->default('No')->nullable();
            $table->enum('masterbrand', ['Yes', 'No'])->default('No')->nullable();
            $table->enum('verifybrand', ['Yes', 'No'])->default('No')->nullable();
            $table->longText('busioverview')->nullable();
            $table->string('video_url')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->string('tbanner')->nullable();
            $table->string('tbanner1')->nullable();
            $table->string('tbanner2')->nullable();
            $table->string('tbanner3')->nullable();
            $table->string('tbanner4')->nullable();
            $table->string('tbanner5')->nullable();
            $table->string('ppt')->nullable();
            $table->string('priorityhome')->nullable();
            $table->string('prioritycat')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
