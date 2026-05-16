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
        Schema::table('about_sections', function (Blueprint $table) {

            $table->string('icon')->nullable()->after('content');

            $table->string('point_1')->nullable()->after('icon');

            $table->string('point_2')->nullable()->after('point_1');

            $table->string('point_3')->nullable()->after('point_2');

            $table->string('year')->nullable()->after('point_3');

            $table->string('experience_year')->nullable()->after('year');

            $table->string('experience_text')->nullable()->after('experience_year');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_sections', function (Blueprint $table) {
            $table->dropColumn(['icon', 'point_1', 'point_2', 'point_3', 'year', 'experience_year', 'experience_text']);
        });
    }
};
