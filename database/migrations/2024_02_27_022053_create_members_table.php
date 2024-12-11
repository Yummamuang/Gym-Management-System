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
        Schema::create('members', function (Blueprint $table) {
            $table->string('memberid')->unique()->primary();
            $table->string('mfname', 50);
            $table->string('mlname', 50);
            $table->date('birthday');
            $table->integer('age');
            $table->string('sex', 6);
            $table->integer('weight');
            $table->integer('height');
            $table->longText('address');
            $table->string('phone', 10);
            $table->string('email')->unique();
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
        Schema::dropIfExists('members');
    }
};
