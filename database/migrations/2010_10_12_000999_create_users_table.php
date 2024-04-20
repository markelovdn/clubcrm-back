<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
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
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('vk_id')->nullable();
            $table->timestamp('google_id')->nullable();
            $table->timestamp('yandex_id')->nullable();
            $table->string('password')->nullable($value = true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
