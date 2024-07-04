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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('titleContact')->nullable();
            $table->string('subtitleContact')->nullable();
            $table->string('addressContact')->nullable();
            $table->string('phoneContact')->nullable();
            $table->string('emailContact')->nullable();
            $table->string('workingHoursContact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
