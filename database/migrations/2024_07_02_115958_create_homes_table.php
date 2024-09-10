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
            // Hero Section
            $table->string('titleHeroSection')->nullable();
            $table->string('subtitleHeroSection')->nullable();
            $table->string('buttonHeroSection')->nullable();
            $table->string('imageHeroSectionPath')->nullable();
            $table->string('imageHeroSectionName')->nullable();

            // Info Cards Section
            $table->string('infoBoxTitleOne')->nullable();
            $table->text('infoBoxContentOne')->nullable();
            $table->string('buttonBoxTextOne')->nullable();
            $table->string('infoBoxImageOne')->nullable();
            $table->string('infoBoxImageNameOne')->nullable();

            $table->string('infoBoxTitleTwo')->nullable();
            $table->text('infoBoxContentTwo')->nullable();
            $table->string('buttonBoxTextTwo')->nullable();
            $table->string('infoBoxImageTwo')->nullable();
            $table->string('infoBoxImageNameTwo')->nullable();

            $table->string('infoBoxTitleThree')->nullable();
            $table->text('infoBoxContentThree')->nullable();
            $table->string('buttonBoxTextThree')->nullable();
            $table->string('infoBoxImageThree')->nullable();
            $table->string('infoBoxImageNameThree')->nullable();

            // About Section
            $table->string('titleAbout')->nullable();
            $table->string('subtitleAbout')->nullable();
            $table->text('contentAbout')->nullable();
            $table->string('buttonTextAbout')->nullable();

            // Mission Section
            $table->string('missionTitle')->nullable();
            $table->text('missionContent')->nullable();
            $table->string('missionStatsNumberOne')->nullable();
            $table->string('missionStatsNumberTwo')->nullable();
            $table->string('missionStatsNumberThree')->nullable();
            $table->string('missionStatsTitleOne')->nullable();
            $table->string('missionStatsTitleTwo')->nullable();
            $table->string('missionStatsTitleThree')->nullable();
            $table->string('missionPicturePathOne')->nullable();
            $table->string('missionPictureNameOne')->nullable();
            $table->string('missionPicturePathTwo')->nullable();
            $table->string('missionPictureNameTwo')->nullable();
            $table->string('missionPicturePathThree')->nullable();
            $table->string('missionPictureNameThree')->nullable();

            // Book Your Appointment Section
            $table->string('bookYourAppointmentTitle')->nullable();
            $table->text('bookYourAppointmentContent')->nullable();
            $table->string('bookYourAppointmentButton')->nullable();

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
