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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('mark_id')->nullable();
            $table->string('registration_id')->nullable();
            $table->string('course_id')->nullable();
            $table->string('student_id')->nullable();
            $table->string('session')->nullable();
            $table->string('year')->nullable();
            $table->string('term')->nullable();
            $table->string('tgpa')->nullable();
            $table->string('ygpa')->nullable();
            $table->string('cgpa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
