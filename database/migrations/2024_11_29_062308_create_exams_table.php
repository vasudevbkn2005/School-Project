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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_name_id')->constrained('exam_names')->onDelete('cascade'); // Foreign key for ExamName
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade'); // Foreign key for Type
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
