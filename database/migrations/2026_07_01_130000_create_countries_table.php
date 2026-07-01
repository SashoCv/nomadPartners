<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->index();
            $table->string('iso_code', 2)->nullable();
            $table->string('name');
            $table->string('title');
            $table->text('short_description')->nullable();
            $table->longText('content')->nullable();
            $table->string('sectors')->nullable();
            $table->string('languages')->nullable();
            $table->string('permit_time')->nullable();
            $table->string('imagePath')->nullable();
            $table->string('imageName')->nullable();
            $table->integer('order')->default(0);
            $table->unsignedBigInteger('language_id')->default(1);
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
