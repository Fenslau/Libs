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
            $table->string('login')->unique();
            $table->tinyInteger('online')->default('0');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('user_lang')->default('ru');
            $table->string('city')->nullable()->index();
            $table->string('find_city')->nullable()->index();
            $table->integer('user_age')->nullable()->index();
            $table->integer('find_age_to')->nullable()->index();
            $table->integer('find_age_from')->nullable()->index();
            $table->integer('user_height')->nullable()->index();
            $table->integer('user_weight')->nullable()->index();
            $table->text('user_about')->nullable();
            $table->string('user_ava')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
