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
            $table->string('serviceTitle')->nullable();
            $table->string('serviceContent')->nullable();
            $table->string('serviceImageStatsOnePath')->nullable();
            $table->string('serviceImageStatsOneName')->nullable();
            $table->string('serviceStatsNumberOne')->nullable();
            $table->string('serviceStatsTextOne')->nullable();
            $table->string('serviceImageStatsTwoPath')->nullable();
            $table->string('serviceImageStatsTwoName')->nullable();
            $table->string('serviceStatsNumberTwo')->nullable();
            $table->string('serviceStatsTextTwo')->nullable();
            $table->string('serviceImageStatsThreePath')->nullable();
            $table->string('serviceImageStatsThreeName')->nullable();
            $table->string('serviceStatsNumberThree')->nullable();
            $table->string('serviceStatsTextThree')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homes', function (Blueprint $table) {
            //
        });
    }
};
