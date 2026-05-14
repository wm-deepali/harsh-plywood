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
        Schema::create('hi_style_pages', function (Blueprint $table) {

            $table->id();

            /*
            HERO SECTION
            */

            $table->string('hero_heading')->nullable();

            $table->string('hero_sub_heading')->nullable();

            $table->text('hero_description')->nullable();

            $table->string('hero_button_text')->nullable();

            $table->string('hero_button_link')->nullable();

            $table->string('hero_image')->nullable();

            /*
            INTRODUCTION SECTION
            */

            $table->string('intro_sub_title')->nullable();

            $table->string('intro_heading')->nullable();

            $table->longText('intro_content')->nullable();

            $table->string('intro_image_1')->nullable();

            $table->string('intro_image_2')->nullable();

            /*
            CONTACT SECTION
            */

            $table->string('contact_heading')->nullable();

            $table->text('contact_description')->nullable();

            $table->string('contact_phone')->nullable();

            $table->string('contact_email')->nullable();

            $table->string('counter_heading')->nullable();

            $table->string('counter_sub_heading')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hi_style_pages');
    }
};