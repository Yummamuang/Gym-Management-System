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
            $table->string('courseid')->primary()->unique();
            $table->string('cname')->nullable();
            $table->integer('cost')->nullable();
            $table->date('start_course')->nullable();
            $table->date('end_course')->nullable();
            $table->string('memberid')->nullable()->unique();
            $table->string('trainerid')->nullable()->unique();
            $table->string('exerciseid')->nullable()->unique();
            $table->string('dietid')->nullable()->unique();
            
            $table->foreign('memberid')->references('memberid')->on('members')->onDelete('set null');
            $table->foreign('trainerid')->references('trainerid')->on('trainers')->onDelete('set null');
            $table->foreign('exerciseid')->references('exerciseid')->on('exercises')->onDelete('set null');
            $table->foreign('dietid')->references('dietid')->on('diet_plans')->onDelete('set null');
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
