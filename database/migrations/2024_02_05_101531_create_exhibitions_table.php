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
        Schema::create('exhibitions', function (Blueprint $table) {
            $table->id('exhibition_id');
            $table->string('name', 100);
            $table->string('place', 50);
            $table->tinyInteger('status')->default(0);
            $table->dateTime('event_start');
            $table->dateTime('event_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhibitions');
    }
};
