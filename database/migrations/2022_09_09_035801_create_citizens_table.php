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
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->string('rg')->unique();
            $table->string('cpf')->nullable();
            $table->string('name')->nullable();
            $table->string('filiation1')->nullable();
            $table->string('filiation2')->nullable();
            $table->string('filiation3')->nullable();
            $table->integer('migration_situation')->nullable();
            $table->json('other_filiations')->nullable();
            $table->integer('affiliation_id')->nullable();
            $table->string('birth_date')->nullable();
            $table->integer('genre_id')->nullable();
            $table->integer('service_station_id')->nullable();
            $table->string('county_id')->nullable();
            $table->integer('marital_status_id')->nullable();
            $table->string('country_id')->nullable();
            $table->string('portaria_nr')->nullable();
            $table->string('data')->nullable();
            $table->string('dou_nr')->nullable();
            $table->string('secao_folha')->nullable();
            $table->string('data_dou')->nullable();
            $table->integer('uf_id')->nullable();
            $table->string('city_of_birth')->nullable();
            $table->string('occupation_id')->nullable();
            $table->integer('social_indicator_id')->nullable();
            $table->string('n_social')->nullable();
            $table->string('issuing_station')->nullable();
            $table->string('via_rg')->nullable();
            $table->integer('exemption_id')->nullable();
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
        Schema::dropIfExists('citizen');
    }
};
