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
        Schema::create('trainercards', function (Blueprint $table) {
            $table->id();
            $table->string('trainerid')->nullable();
            $table->string('tname')->nullable();
            $table->timestamp('checkin')->nullable();
            $table->timestamp('checkout')->nullable();

            $table->foreign('trainerid')->references('trainerid')->on('trainers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainercards');
    }
};
