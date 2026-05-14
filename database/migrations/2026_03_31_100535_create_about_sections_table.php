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
        Schema::create('about_sections', function (Blueprint $table) {

            $table->id();

            $table->string('type'); // introduction, history, vision, team

            $table->string('heading')->nullable();
            $table->string('sub_heading')->nullable();

            $table->longText('content')->nullable();

            // for team
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->string('designation')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
