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
        Schema::create('children', function (Blueprint $table) {
    $table->id();
    $table->string('password_hash');
    $table->string('address');
    $table->date('birth_date');
    $table->string('parent_contact');
    $table->foreignId('teacher_id')->nullable()->constrained('teachers')->nullOnDelete();
    $table->foreignId('supervisor_id')->nullable()->constrained('supervisors')->nullOnDelete();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};
