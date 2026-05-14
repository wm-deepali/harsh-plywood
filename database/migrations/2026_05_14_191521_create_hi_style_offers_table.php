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
        Schema::create('hi_style_offers', function (Blueprint $table) {

            $table->id();

            $table->string('title')->nullable();

            $table->text('short_content')->nullable();

            $table->string('icon')->nullable();

            $table->string('image')->nullable();

            $table->boolean('status')->default(1);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hi_style_offers');
    }
};