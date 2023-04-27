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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default(1);
            $table->string('remarks');
            $table->string('student_id');
            $table->string('course_id');
            $table->string('enrollment_term');
            $table->string('enrollment_session');
            $table->string('enrollment_year');
            $table->string('enrolled_credit');
            $table->string('is_completed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
