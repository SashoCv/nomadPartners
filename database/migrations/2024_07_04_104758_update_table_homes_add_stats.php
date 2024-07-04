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
            $table->string('statsTitleOne')->nullable();
            $table->string('statsNumberOne')->nullable();
            $table->string('statsTitleTwo')->nullable();
            $table->string('statsNumberTwo')->nullable();
            $table->string('statsTitleThree')->nullable();
            $table->string('statsNumberThree')->nullable();
            $table->string('statsTitleFour')->nullable();
            $table->string('statsNumberFour')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->dropColumn('statsTitleOne');
            $table->dropColumn('statsNumberOne');
            $table->dropColumn('statsTitleTwo');
            $table->dropColumn('statsNumberTwo');
            $table->dropColumn('statsTitleThree');
            $table->dropColumn('statsNumberThree');
            $table->dropColumn('statsTitleFour');
            $table->dropColumn('statsNumberFour');
        });
    }
};
