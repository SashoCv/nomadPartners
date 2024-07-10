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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('titleHeroSection')->nullable();
            $table->string('subtitleHeroSection')->nullable();
            $table->string('buttonHeroSection')->nullable();
            $table->string('imageHeroSectionName')->nullable();
            $table->string('imageHeroSectionPath')->nullable();
            $table->string('testimonialTitleOne')->nullable();
            $table->string('testimonialContentOne')->nullable();
            $table->string('linkTestimonialOne')->nullable();
            $table->string('titleTestimonialTwo')->nullable();
            $table->string('contentTestimonialTwo')->nullable();
            $table->string('linkTestimonialTwo')->nullable();
            $table->string('titleTestimonialThree')->nullable();
            $table->string('contentTestimonialThree')->nullable();
            $table->string('linkTestimonialThree')->nullable();
            $table->string('titleAbout')->nullable();
            $table->string('subtitleAbout')->nullable();
            $table->string('buttonTextAbout')->nullable();
            $table->string('buttonLinkAbout')->nullable();
            $table->string('contentAbout')->nullable();
            $table->string('liveTitle')->nullable();
            $table->string('liveContent')->nullable();
            $table->string('livePictureName')->nullable();
            $table->string('livePicturePath')->nullable();
            $table->string('chooseUsTitle')->nullable();
            $table->string('chooseUsContent')->nullable();
            $table->string('listTitleOne')->nullable();
            $table->string('listContentOne')->nullable();
            $table->string('listTitleTwo')->nullable();
            $table->string('listContentTwo')->nullable();
            $table->string('listTitleThree')->nullable();
            $table->string('listContentThree')->nullable();
            $table->string('missionTitle')->nullable();
            $table->string('missionContent')->nullable();
            $table->string('missionPictureNameOne')->nullable();
            $table->string('missionPicturePathOne')->nullable();
            $table->string('missionPictureNameTwo')->nullable();
            $table->string('missionPicturePathTwo')->nullable();
            $table->string('missionPictureNameThree')->nullable();
            $table->string('missionPicturePathThree')->nullable();
            $table->string('partnersTitle')->nullable();
            $table->string('partnersSubtitle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
