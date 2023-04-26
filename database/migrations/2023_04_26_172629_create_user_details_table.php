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
        Schema::create('user_details', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('student_id')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('batch')->nullable();
            $table->string('designation')->nullable();
            $table->string('hall')->nullable();
            $table->string('hall_status')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('quata')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('religion')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('gurdian')->nullable();
            $table->string('local_gurdian')->nullable();
            $table->string('admitted_at')->nullable();
            $table->string('nid')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
