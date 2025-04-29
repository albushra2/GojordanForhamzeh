<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('total_guests')->default(1);
            $table->integer('children_count')->default(0);
            $table->text('special_requests')->nullable();
            $table->boolean('terms_agreed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
        
    }
};
