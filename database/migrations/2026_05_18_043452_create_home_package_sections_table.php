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
        Schema::create('home_package_sections', function (Blueprint $table) {

            $table->id();

            // LEFT
            $table->string('left_logo')->nullable();
            $table->longText('left_description')->nullable();
            $table->string('left_contact_text')->nullable();
            $table->string('left_contact_link')->nullable();
            $table->string('left_whatsapp_text')->nullable();
            $table->string('left_whatsapp_link')->nullable();

            // MIDDLE
            $table->string('middle_subtitle')->nullable();
            $table->string('middle_title')->nullable();

            $table->string('feature_icon_1')->nullable();
            $table->string('feature_text_1')->nullable();

            $table->string('feature_icon_2')->nullable();
            $table->string('feature_text_2')->nullable();

            $table->string('feature_icon_3')->nullable();
            $table->string('feature_text_3')->nullable();

            $table->string('middle_button_text')->nullable();
            $table->string('middle_button_link')->nullable();

            // RIGHT
            $table->string('right_logo')->nullable();
            $table->longText('right_description')->nullable();
            $table->string('right_contact_text')->nullable();
            $table->string('right_contact_link')->nullable();
            $table->string('right_whatsapp_text')->nullable();
            $table->string('right_whatsapp_link')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_package_sections');
    }
};
