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
        Schema::create('gardens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('garden_type', ['Mother', 'coffee']); 
            $table->string('garden_name');
            $table->string('manager_name');
            $table->unsignedBigInteger('district_id'); // References districts table
            $table->decimal('location_latitude', 10, 6)->nullable();
            $table->decimal('location_longitude', 10, 6)->nullable();
            $table->decimal('garden_size', 8, 2); // Acres
            $table->string('planting_method'); // Dynamic planting methods
            $table->enum('land_ownership', ['Rented', 'Owned']);
            $table->enum('farmer_ownership', ['Family', 'Individual', 'Group']);
            $table->date('date_started');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gardens');
    }
};
