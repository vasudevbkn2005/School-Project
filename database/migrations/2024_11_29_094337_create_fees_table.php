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
        Schema::create('fees', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('class_id')->nullable(); // Foreign key to classes table
            $table->decimal('total_amount', 10, 2); // Total fee amount
            $table->decimal('discount', 10, 2)->default(0); // Discount amount
            $table->decimal('final_price', 10, 2)->storedAs('total_amount - discount'); // Final amount after discount
            $table->date('due_date'); // Fee creation date
            $table->date('due_fees'); // Fee due date
            $table->string('status')->default('pending'); // Fee status
            $table->text('description')->nullable(); // Optional fee description
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
