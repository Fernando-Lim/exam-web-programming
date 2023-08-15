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
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('TransID');
            $table->unsignedBigInteger('CourseID');
            $table->unsignedBigInteger('InstructorID');
            $table->date('StartDate');
            $table->decimal('Price', 10, 2);
            $table->decimal('Discount', 10, 2);
            $table->timestamps();

            // Define foreign keys
            $table->foreign('TransID')->references('id')->on('transactions')->onDelete('cascade');
            $table->foreign('CourseID')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('InstructorID')->references('id')->on('instructors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transactions');
    }
};
