<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('images');
            
            // Explicit foreign key definition
            $table->unsignedBigInteger('travel_package_id');
            $table->foreign('travel_package_id')
                  ->references('id')
                  ->on('travel_packages')
                  ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
