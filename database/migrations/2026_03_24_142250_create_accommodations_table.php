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
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('location')->nullable();
            $table->string('price');
            $table->string('rooms');
            $table->text('images');
            $table->boolean('availability')->default(true);
            $table->string('bathrooms');
            $table->boolean('showers')->default(true);
            $table->string('aminities');
            $table->enum('apartment_type', ['House', 'Apartment', 'Hotel', 'Letting', 'Other']);
            $table->boolean('parking')->default(true)->nullable();
            $table->boolean('pool')->default(false)->nullable();
            $table->string('point_of_interest')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodations');
    }
};
