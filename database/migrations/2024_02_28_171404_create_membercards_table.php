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
        Schema::create('membercards', function (Blueprint $table) {
            $table->id();
            $table->string('memberid')->nullable();
            $table->string('mname')->nullable();
            $table->timestamp('checkin')->nullable();
            $table->timestamp('checkout')->nullable();
            
            $table->foreign('memberid')->references('memberid')->on('members');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membercards');
    }
};
