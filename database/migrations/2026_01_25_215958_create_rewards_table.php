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
        Schema::create('rewards', function (Blueprint $table) {
    $table->id();
    $table->string('reward_type',100);
    $table->date('reward_date');
    $table->integer('points');
    $table->foreignId('child_id')->nullable()->constrained('children')->nullOnDelete();
    $table->foreignId('teacher_id')->nullable()->constrained('teachers')->nullOnDelete();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rewards');
    }
};
