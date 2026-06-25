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
        Schema::create('haunted_houses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location')->index();
            $table->decimal('price_per_night', 8, 2);
            $table->text('description')->nullable();
            $table->text('image_url')->nullable();
            $table->boolean('is_recommended')->default(false)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('haunted_houses');
    }
};
