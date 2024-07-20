<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('titleHeroAboutUs')->nullable();
            $table->string('subtitleHeroAboutUs')->nullable();
            $table->string('imageHeroAboutUsPath')->nullable();
            $table->string('linkHeroAboutUs1')->nullable();
            $table->string('buttonNameHeroAboutUs1')->nullable();
            $table->string('linkHeroAboutUs2')->nullable();
            $table->string('buttonNameHeroAboutUs2')->nullable();
            $table->string('iconWhoWeAre1')->nullable();
            $table->string('titleWhoWeAre1')->nullable();
            $table->text('contentWhoWeAre1')->nullable();
            $table->string('iconWhoWeAre2')->nullable();
            $table->string('titleWhoWeAre2')->nullable();
            $table->text('contentWhoWeAre2')->nullable();
            $table->string('iconWhoWeAre3')->nullable();
            $table->string('titleWhoWeAre3')->nullable();
            $table->text('contentWhoWeAre3')->nullable();
            $table->string('titleOurMission')->nullable();
            $table->text('descriptionOurMission')->nullable();
            $table->string('iconMission1')->nullable();
            $table->string('titleMission1')->nullable();
            $table->text('descriptionMission1')->nullable();
            $table->string('iconMission2')->nullable();
            $table->string('titleMission2')->nullable();
            $table->text('descriptionMission2')->nullable();
            $table->string('iconMission3')->nullable();
            $table->string('titleMission3')->nullable();
            $table->text('descriptionMission3')->nullable();
            $table->string('contactUsTitle')->nullable();
            $table->text('contactUsText')->nullable();
            $table->text('aboutUsText')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us');
    }
}
