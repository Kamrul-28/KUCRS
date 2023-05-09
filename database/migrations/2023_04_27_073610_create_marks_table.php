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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->string('attendance')->nullable();
            $table->string('ctOne')->nullable();
            $table->string('ctTwo')->nullable();
            $table->string('ctThree')->nullable();
            $table->string('total_class_test_marks')->nullable();
            $table->string('avg_class_test_marks')->nullable();
            $table->string('sectionA')->nullable();
            $table->string('sectionB')->nullable();
            $table->string('total_mark_in_exam')->nullable();
            $table->string('final_mark')->nullable();
            $table->string('grade_id')->nullable();
            $table->string('course_id')->nullable();
            $table->string('student_id')->nullable();
            $table->string('teacher_id')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
};
