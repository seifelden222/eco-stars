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
        Schema::create('child_course', function (Blueprint $table) {
    $table->foreignId('child_id')->constrained('children')->cascadeOnDelete();
    $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
    $table->primary(['child_id','course_id']);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_course');
    }
};
