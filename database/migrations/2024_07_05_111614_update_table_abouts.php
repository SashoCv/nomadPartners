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
        Schema::table('about_us', function (Blueprint $table) {
            $table->string('linkHeroAboutUs1')->nullable();
            $table->string('buttonNameHeroAboutUs1')->nullable();
            $table->string('linkHeroAboutUs2')->nullable();
            $table->string('buttonNameHeroAboutUs2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn('linkHeroAboutUs1');
            $table->dropColumn('buttonNameHeroAboutUs1');
            $table->dropColumn('linkHeroAboutUs2');
            $table->dropColumn('buttonNameHeroAboutUs2');
        });
    }
};
