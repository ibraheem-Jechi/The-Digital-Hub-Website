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
        // Using plural 'abouts' follows Laravel convention
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle')->nullable(); // H4 above title
            $table->string('title');                // Main H1
            $table->text('description')->nullable();// Main paragraph

            // Feature 1
            $table->string('feature_1_icon')->nullable();
            $table->string('feature_1_title')->nullable();
            $table->text('feature_1_description')->nullable();

            // Feature 2
            $table->string('feature_2_icon')->nullable();
            $table->string('feature_2_title')->nullable();
            $table->text('feature_2_description')->nullable();

            // Feature 3
            $table->string('feature_3_icon')->nullable();
            $table->string('feature_3_title')->nullable();
            $table->text('feature_3_description')->nullable();

            $table->string('phone')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};

