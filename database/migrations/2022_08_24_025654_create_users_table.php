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
            $table->string('cpf');
            $table->string('name');
            $table->string('city');
            $table->boolean('blocked')->default(0);
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->integer('type_street')->nullable();
            $table->string('number');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('complement')->nullable();
            $table->string('district')->nullable();
            $table->string('uf', 5)->nullable();
            $table->timestamp('activate_date_time')->nullable();
            $table->boolean('status')->default(1);
            $table->string('cell');
            $table->string('user_name')->nullable();
            $table->string('profile_id')->nullable();
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
