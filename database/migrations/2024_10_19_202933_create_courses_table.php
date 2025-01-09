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
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('title', 100);
            $table->string('slug', 100);
            $table->string('description')->nullable();
            $table->string('image_cover')->nullable();
            $table->enum('session_type', ['online', 'offline'])->default('online');
            $table->date('schedule_start');
            $table->date('schedule_end');
            $table->string('mentor', 100);
            $table->integer('price');
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
