<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id');
            $table->foreignId('district_id')->nullable();
            $table->foreignId('region_id');
            $table->string('locality');
            $table->string('street');
            $table->string('house_number');
            $table->string('apartment_number')->nullable();
            $table->string('post_index')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
