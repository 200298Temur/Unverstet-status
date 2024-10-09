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
        Schema::create('university_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('university_id')->constrained('unverstets')->onDelete('cascade');
            $table->decimal('employment_rate', 5, 2);
            $table->decimal('average_income', 10, 2);
            $table->decimal('employment_growth_rate', 5, 2);
            $table->integer('year');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_statistics');
    }
};
