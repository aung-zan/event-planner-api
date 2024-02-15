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
        Schema::create('spot_receptions', function (Blueprint $table) {
            $table->id('spot_reception_id');
            $table->foreignId('spot_id')->constrained(table: 'spots', column: 'spot_id');
            $table->foreignId('visitor_id')->constrained(table: 'visitors', column: 'visitor_id');
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
        Schema::dropIfExists('spot_receptions');
    }
};
