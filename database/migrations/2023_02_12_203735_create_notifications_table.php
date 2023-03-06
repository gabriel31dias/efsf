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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->unsignedBigInteger('user_id_emiter');
            $table->unsignedBigInteger('user_id_receive')->nullable();
            $table->boolean('visualized')->default(false);
            $table->string('resolution_url');
            $table->integer('citizen_id');
            $table->integer('service_station_id')->nullable();
            $table->integer('type');
            $table->timestamps();
            $table->foreign('user_id_emiter')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id_receive')->references('id')->on('users')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
