<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('process');
            $table->string('name');
            $table->integer('citizen_id');
            $table->integer('user_id');
            $table->integer('biometrics_status');//Pendente, válido, Processando
            $table->integer('situation');
            $table->integer('service_station_id');
            $table->integer('payment');
            $table->boolean('status')->default(1);
            $table->boolean('divergence')->default(0);
            $table->integer('to_user_id')->nullable();
            $table->integer('to_service_station_id')->nullable();
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
        Schema::dropIfExists('processes');
    }
};
