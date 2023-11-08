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
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->foreignUuid('user_id')->nullable()->constrained('users', 'uuid');
            $table->foreignUuid('room_id')->nullable()->constrained('rooms', 'uuid');
            $table->string('number')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('no_of_guests')->nullable();
            $table->decimal('amount', 10, 2)->nullable()->default(0);
            $table->tinyInteger('status')->default(2)->comment('0 => Deleted; 1=>Booked; 2=>Available');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
