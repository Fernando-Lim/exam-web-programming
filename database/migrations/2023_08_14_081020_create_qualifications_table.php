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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('TopicID');
            $table->unsignedBigInteger('InstructorID');
            // Add any other columns you need for qualifications
            $table->timestamps();

            // Define foreign keys
            $table->foreign('TopicID')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('InstructorID')->references('id')->on('instructors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualifications');
    }
};
