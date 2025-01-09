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
        Schema::table('course_details', function (Blueprint $table) {
            $table->smallInteger('position')->default(1);
            $table->string('pdf_document')->nullable();
            $table->string('slide_embedded_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_details', function (Blueprint $table) {
            $table->dropColumn(['orders', 'pdf_document', 'slides_document']);
        });
    }
};
