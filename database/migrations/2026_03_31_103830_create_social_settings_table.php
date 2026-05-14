<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_social_settings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_settings', function (Blueprint $table) {

            $table->id();

            $table->text('facebook')->nullable();

            $table->text('instagram')->nullable();

            $table->text('youtube')->nullable();

            $table->text('google_plus')->nullable();

            $table->text('linkedin')->nullable();

            $table->text('twitter')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_settings');
    }
};