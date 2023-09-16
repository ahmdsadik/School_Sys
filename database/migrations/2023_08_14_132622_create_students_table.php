<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->foreignId('gender_id')->constrained();
            $table->foreignId('blood_type_id')->constrained();
            $table->foreignId('nationality_id')->constrained();
            $table->foreignId('grade_id')->constrained();
            $table->foreignId('classroom_id')->constrained();
            $table->foreignId('section_id')->constrained();
            $table->foreignId('student_parent_id')->constrained();
            $table->date('date_birth');
            $table->year('academic_year');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
