<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('why_choose_sections', function (Blueprint $table) {

            $table->id();

            $table->string('sub_heading')->nullable();

            $table->string('heading')->nullable();

            $table->longText('description')->nullable();

            $table->string('main_image')->nullable();

            $table->string('small_image')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_sections');
    }
};
