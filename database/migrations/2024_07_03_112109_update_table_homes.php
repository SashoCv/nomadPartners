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
        Schema::table('homes', function (Blueprint $table) {
            $table->string('whoWeAreTitleAbout')->nullable();
            $table->text('whoWeAreContentAbout')->nullable();
            $table->string('whoWeArePicturePathAbout')->nullable();
            $table->string('whoWeArePictureNameAbout')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->dropColumn('whoWeAreTitleAbout');
            $table->dropColumn('whoWeAreContentAbout');
            $table->dropColumn('whoWeArePicturePathAbout');
            $table->dropColumn('whoWeArePictureNameAbout');
        });
    }
};
