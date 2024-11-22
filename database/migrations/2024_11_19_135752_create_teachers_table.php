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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Teacher's name
            $table->string('image')->nullable(); // Optional image
            $table->string('email')->unique(); // Unique email
            $table->string('phone')->nullable(); // Optional phone number
            $table->string('qualification')->nullable(); // Optional qualifications
            $table->unsignedBigInteger('subject_id'); // Foreign key column

            // Define the foreign key constraint
            $table->foreign('subject_id')
                ->references('id')
                ->on('subjects')
                ->onDelete('cascade');

            $table->timestamps(); // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
