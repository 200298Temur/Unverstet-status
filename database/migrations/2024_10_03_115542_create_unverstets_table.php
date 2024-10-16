<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unverstets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->string('region');
            $table->string('image')->nullable();
            $table->text('about');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('unverstets');
    }
};