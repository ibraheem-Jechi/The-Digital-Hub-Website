<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id('workshop_id'); // Primary Key
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('event_date');
            $table->unsignedBigInteger('program_id')->nullable(); // FK later
            $table->string('image')->nullable(); // store image path or filename
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workshops');
    }
};
