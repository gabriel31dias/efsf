<?php

use App\Models\Feature;
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
        Schema::create('ballots', function (Blueprint $table) {
            $table->id();
            $table->integer('typeCreation')->nullable()->default(0);
            $table->string('stringBallots', 100)->nullable();
            $table->string('stringBallotsUnused', 100)->nullable();
            $table->integer('error')->nullable()->default(0);
            $table->integer('initial')->nullable()->default(0);
            $table->integer('final')->nullable()->default(0);
            $table->json('stringBallotsErrors', 100)->nullable();
            $table->integer('service_station_id')->nullable();
            $table->string('ballot_process')->nullable();
            $table->integer('user_id')->nullable();
            $table->json('stringBallotsUnusedJson')->nullable();
            $table->json('stringBallotsJson')->nullable();
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
        Schema::dropIfExists('ballots');
    }
};
