<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('student_parents', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            // Father
            $table->string('father_name');
            $table->string('father_national_id_number');
            $table->string('father_passport_number');
            $table->string('father_phone');
            $table->string('father_job');
            $table->foreignId('father_nationality_id')->constrained('nationalities', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('father_blood_type_id')->constrained('blood_types', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('father_religion_id')->constrained('religions', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('father_address');
            // Mother
            $table->string('mother_name');
            $table->string('mother_national_id_number');
            $table->string('mother_passport_number');
            $table->string('mother_phone');
            $table->string('mother_job');
            $table->foreignId('mother_nationality_id')->constrained('nationalities', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('mother_blood_type_id')->constrained('blood_types', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('mother_religion_id')->constrained('religions', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('mother_address');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_parents');
    }
};
