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
        Schema::create('old_students', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_working');
            $table->string('job')->nullable();
            $table->integer('salaryYear')->nullable();
            $table->integer('year');
            $table->string( 'passportCode');
            $table->boolean('ruxsat')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('program_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('old_students');
    }
};
