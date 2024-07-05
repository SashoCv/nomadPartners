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
            $table->string('liveButtonText1')->nullable();
            $table->string('liveButtonLink1')->nullable();
            $table->string('liveButtonText2')->nullable();
            $table->string('liveButtonLink2')->nullable();
            $table->string('liveButtonText3')->nullable();
            $table->string('liveButtonLink3')->nullable();
            $table->string('liveButtonText4')->nullable();
            $table->string('liveButtonLink4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn('liveButtonText1');
            $table->dropColumn('liveButtonLink1');
            $table->dropColumn('liveButtonText2');
            $table->dropColumn('liveButtonLink2');
            $table->dropColumn('liveButtonText3');
            $table->dropColumn('liveButtonLink3');
            $table->dropColumn('liveButtonText4');
            $table->dropColumn('liveButtonLink4');
        });
    }
};
