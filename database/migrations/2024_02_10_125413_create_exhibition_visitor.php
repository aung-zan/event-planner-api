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
        Schema::create('exhibition_visitor', function (Blueprint $table) {
            $table->id('exhibition_visitor_id');
            $table->foreignId('exhibition_id')->constrained(table: 'exhibitions', column: 'exhibition_id');
            $table->foreignId('visitor_id')->constrained(table: 'visitors', column: 'visitor_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhibition_visitor');
    }
};
