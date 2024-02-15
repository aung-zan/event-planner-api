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
        Schema::create('seminar_receptions', function (Blueprint $table) {
            $table->id('seminar_reception_id');
            $table->foreignId('seminar_id')->constrained(table: 'seminars', column: 'seminar_id');
            $table->foreignId('visitor_id')->constrained(table: 'visitors', column: 'visitor_id');
            $table->boolean('force_admission')->default(0);
            $table->dateTime('admission_at');
            $table->timestamps();
            $table->foreignId('created_by')->constrained(table: 'staffs', column: 'staff_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seminar_receptions');
    }
};
