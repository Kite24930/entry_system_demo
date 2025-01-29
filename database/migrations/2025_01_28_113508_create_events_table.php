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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Event name');
            $table->date('date')->comment('Event date');
            $table->string('location')->comment('Event location');
            $table->text('description')->comment('Event description');
            $table->time('start_time')->nullable()->comment('Event start time');
            $table->time('end_time')->nullable()->comment('Event end time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
