<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('fulltitle', 345)->nullable();
            $table->string('shorttitle', 145)->nullable();
            $table->string('reg_code',)->nullable();
            $table->string('domen',)->nullable();
            $table->boolean('verified',)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
