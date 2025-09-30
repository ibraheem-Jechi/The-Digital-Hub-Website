<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title');          // e.g., "English Sessions"
            $table->string('subtitle')->nullable(); // e.g., "Where you improve your English"
            $table->text('description');      // e.g., description text
            $table->string('image')->nullable(); // e.g., "english.jpeg"
            $table->string('button_text')->nullable(); // e.g., "Learn More"
            $table->string('button_link')->nullable(); // e.g., "#"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
