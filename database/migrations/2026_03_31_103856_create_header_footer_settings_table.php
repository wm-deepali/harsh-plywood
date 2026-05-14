<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('header_footer_settings', function (Blueprint $table) {

            $table->id();

            $table->string('header_logo')->nullable();

            $table->string('footer_logo')->nullable();

            $table->string('whatsapp')->nullable();

            $table->string('mobile')->nullable();

            $table->text('address')->nullable();

            $table->text('short_content')->nullable();

            $table->string('copyright')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('header_footer_settings');
    }
};