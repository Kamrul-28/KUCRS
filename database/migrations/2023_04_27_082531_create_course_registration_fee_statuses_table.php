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
        Schema::create('course_registration_fee_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('fee_id');
            $table->string('registration_id');
            $table->string('student_id');
            $table->string('registration_status');
            $table->string('payment_status');
            $table->string('session');
            $table->string('year');
            $table->string('term');
            $table->string('authorized_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_registration_fee_statuses');
    }
};
