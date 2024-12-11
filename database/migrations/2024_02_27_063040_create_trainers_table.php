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
        Schema::create('trainers', function (Blueprint $table) {
            $table->string('trainerid')->unique()->primary();
            $table->string('tfname', 50);
            $table->string('tlname', 50);
            $table->date('birthday');
            $table->integer('age');
            $table->string('sex', 6);
            $table->integer('weight');
            $table->integer('height');
            $table->longText('address');
            $table->string('phone', 10);
            $table->string('email')->unique();
            $table->integer('experience');
            $table->integer('salary');
            $table->string('username');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};
