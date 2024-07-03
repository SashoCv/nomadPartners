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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('imageHeroAboutUsPath')->nullable();
            $table->string('titleWhoWeAre')->nullable();
            $table->text('contentWhoWeAre')->nullable();
            $table->string('whoWeArePictureAboutUs')->nullable();
            $table->string('liveTitleAboutUs')->nullable();
            $table->text('liveContentAboutUs')->nullable();
            $table->string('livePicturePathAboutUs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
