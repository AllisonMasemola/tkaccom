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
        Schema::create('prestiges', function (Blueprint $table) {
            $table->id();
            $table->string('car_name');
            $table->text('car_description')->nullable();
            $table->enum('transmission', ['automatic', 'manual'])->nullable();
            $table->string('kilometers');
            $table->string('year')->nullable();
            $table->string('price');
            $table->string('delivery_fee')->nullable();
            $table->string('image');
            $table->string('make');
            $table->string('model');
            $table->string('engine-size')->nullable();
            $table->string('top_speed')->nullable();
            $table->boolean('insurance')->default(false);
            $table->string('body_type');
            $table->string('terms_conditions');
            $table->integer('min_age');
            $table->enum('fuel_type', ['petrol', 'diesel', 'electric', 'hybrid', 'other']);
            $table->string('doors')->nullable();
            $table->string('seats')->nullable();
            $table->string('color')->nullable();
            $table->boolean('availability')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestiges');
    }
};
