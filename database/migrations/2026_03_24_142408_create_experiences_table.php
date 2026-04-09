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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('image');
            $table->string('location');
            $table->string('rating')->nullable();
            $table->boolean('availability')->default(true);
            $table->decimal('price', 10, 2)->default(0);
            $table->string('min_age')->nullable()->default('0');
            $table->string('max_participants')->nullable()->default('8');
            $table->string('duration')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
