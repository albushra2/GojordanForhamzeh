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
        Schema::create('travel_packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('type'); // نوع السياحة (دينية، ثقافية، مغامرات...)
            $table->string('location');
            $table->integer('price');
            $table->integer('duration_days')->default(1);
            $table->text('description');
            $table->text('itinerary')->nullable(); // البرنامج اليومي
            $table->text('included')->nullable(); // ما يشمل
            $table->text('excluded')->nullable(); // ما لا يشمل
            $table->foreignId('category_id')->constrained();
            $table->foreignId('tour_guide_id')->nullable()->constrained('tour_guides');
            $table->decimal('average_rating', 3, 2)->default(0);
            $table->integer('reviews_count')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_packages');
    }
};
