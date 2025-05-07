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
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('travel_package_id')->constrained()->cascadeOnDelete();
            $table->string('phone');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('total_guests')->default(1);
            $table->integer('children_count')->default(0);
            $table->text('special_requests')->nullable();
            $table->boolean('terms_agreed')->default(false);
            $table->enum('group_type', ['individual', 'family'])->default('individual');
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->boolean('is_reviewed')->default(false);
            $table->timestamps();
            $table->softDeletes();
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
