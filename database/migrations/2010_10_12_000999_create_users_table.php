<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('secondname')->nullable($value = true);
            $table->string('firstname')->nullable($value = true);
            $table->string('middlename')->nullable($value = true);
            $table->date('date_of_birth')->nullable($value = true);;
            $table->string('email')->unique()->nullable($value = true);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique()->nullable($value = true);
            $table->string('phone_verified_at')->nullable();
            $table->string('vk_id')->unique()->nullable();
            $table->string('google_id')->unique()->nullable();
            $table->string('yandex_id')->unique()->nullable();
            $table->string('password')->nullable($value = true);
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
