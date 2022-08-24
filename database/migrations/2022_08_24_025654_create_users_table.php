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
            $table->string('cpf', 100);
            $table->string('name', 100);
            $table->string('zip_code', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->integer('type_street')->nullable();
            $table->string('number', 20);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('complement', 100)->nullable();
            $table->string('district', 30)->nullable();
            $table->string('uf', 5)->nullable();
            $table->timestamp('activate_date_time')->nullable();
            $table->boolean('status');
            $table->string('cell', 15);
            $table->string('user_name', 30)->nullable();
            $table->string('password', 30)->nullable();
            $table->string('profile_id')->nullable();
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
