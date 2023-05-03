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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_title');
            $table->unsignedBigInteger('discipline_id');
            $table->string('teacher_id')->nullable();
            $table->string('course_code');
            $table->string('course_type')->nullable();
            $table->string('course_pattern');
            $table->string('course_credit');
            $table->text('description');
            $table->string('year');
            $table->string('term');
            $table->longText('sec_a_syllabus')->nullable();
            $table->longText('sec_b_syllabus')->nullable();
            $table->longText('offered_in_general')->nullable();
            $table->longText('offered_in_special')->nullable();
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
