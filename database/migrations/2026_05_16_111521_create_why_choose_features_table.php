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
        Schema::create('why_choose_features', function (Blueprint $table) {

            $table->id();

            $table->enum('position', ['left', 'right']);

            $table->string('title');

            $table->text('description')->nullable();

            $table->string('icon')->nullable();

            $table->boolean('status')->default(1);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_features');
    }
};
