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

        Schema::create('filiations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('type');
            $table->integer('citizen_id');
            $table->foreign('citizen_id')->references('id')->on('citizens');    
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
        Schema::dropIfExists('filiations');
    }
};
