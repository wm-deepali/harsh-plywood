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
        Schema::create('home_video_sections', function (Blueprint $table) {
            $table->id();

            $table->string('subtitle')->nullable();
            $table->string('title')->nullable();

            $table->string('background_image')->nullable();

            // youtube/vimeo/mp4
            $table->string('video_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_video_sections');
    }
};
