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
            $table->foreignId('language_id')->nullable()->default(2)->constrained();
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->foreignId('language_id')->nullable()->default(2)->constrained();
        });

        Schema::table('blog_categories', function (Blueprint $table) {
            $table->foreignId('language_id')->nullable()->default(2)->constrained();
        });

        Schema::table('blog_pages', function (Blueprint $table) {
            $table->foreignId('language_id')->nullable()->default(2)->constrained();
        });

        Schema::table('homes', function (Blueprint $table) {
            $table->foreignId('language_id')->nullable()->default(2)->constrained();
        });

        Schema::table('partner_infos', function (Blueprint $table) {
            $table->foreignId('language_id')->nullable()->default(2)->constrained();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropColumn('language_id');
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropColumn('language_id');
        });

        Schema::table('blog_categories', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropColumn('language_id');
        });

        Schema::table('blog_pages', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropColumn('language_id');
        });

        Schema::table('homes', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropColumn('language_id');
        });

        Schema::table('partner_infos', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropColumn('language_id');
        });
    }
};
