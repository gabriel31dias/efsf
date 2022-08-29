<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_stations', function (Blueprint $table) {
            $table->id();
            $table->string('service_station_name', 50);
            $table->string('acronym_post', 15);
            $table->integer('type_of_post');
            $table->boolean('status');
            $table->string('city');
            $table->string('cep', 30);
            $table->integer('type_of_street');
            $table->string('address', 50);
            $table->string('number', 20);
            $table->string('complement', 50);
            $table->string('district', 50);
            $table->string('uf', 30);
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
        Schema::dropIfExists('service_stations');
    }
}
