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
        Schema::table('setting', function (Blueprint $table) {
            $table->text('first_heading')->nullable()->after('id');
            $table->text('second_heading')->nullable()->after('first_heading');
            $table->text('section_one_content')->nullable()->after('second_heading');
            $table->text('section_one_image')->nullable()->after('section_one_content');
            $table->text('experience_heading')->nullable()->after('section_one_image');
            $table->longText('experience_description')->nullable()->after('experience_heading');
            $table->text('testimonial_heading')->nullable()->after('experience_description');
            $table->text('popular_heading')->nullable()->after('testimonial_heading');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('setting', function (Blueprint $table) {
            //
        });
    }
};
