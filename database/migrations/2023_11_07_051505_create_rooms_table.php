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
        Schema::create('rooms', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('room_no')->unique();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->text('sub_desc')->nullable();
            $table->integer('max_occupancy')->nullable();
            $table->decimal('rate', 10, 2)->default(0);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
