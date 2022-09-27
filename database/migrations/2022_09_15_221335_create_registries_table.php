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
        Schema::create('registries', function (Blueprint $table) {
            $table->id();
            $table->string('sic_code'); 
            $table->string('cns');
            $table->string('name'); 
            $table->string('fantasy_name')->nullable();
            $table->integer('assignment')->default(55);
            $table->string('holder_name')->nullable(); 
            $table->string('support_name')->nullable();
            $table->string('judge_name')->nullable();
            $table->string('note')->nullable();
            $table->boolean('allow_digit')->default(true);
            $table->integer('uf_id');
            $table->integer('county_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registries');
    }
};
