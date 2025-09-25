<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
  public function up(): void
{
    Schema::create('sponsorships', function (Blueprint $table) {
        $table->id();
        $table->string('description');
        $table->string('logo_url')->nullable();
        $table->string('website_url');
        $table->timestamps();
    });
}


   
  public function down(): void{Schema::dropIfExists('sponsorships');}
};