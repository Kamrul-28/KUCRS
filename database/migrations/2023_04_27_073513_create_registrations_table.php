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
            $table->string('remarks')->nullable();
            $table->string('student_id')->nullable();
            $table->string('registration_type')->nullable();
            $table->string('discipline_id')->nullable();
            $table->string('enrollment_term')->nullable();
            $table->string('enrollment_session')->nullable();
            $table->string('enrollment_year')->nullable();
            $table->string('enrolled_credit')->nullable();
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
