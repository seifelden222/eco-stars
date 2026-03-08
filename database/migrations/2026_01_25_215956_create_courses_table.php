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
        Schema::create('courses', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description');
    $table->integer('duration_hours')->nullable();
    $table->integer('lessons_count');
    $table->decimal('price',10,2);
    $table->foreignId('teacher_id')->nullable()->constrained('teachers')->nullOnDelete();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
