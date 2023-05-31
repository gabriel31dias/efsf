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
        Schema::create('ballot_items', function (Blueprint $table) {
            $table->id();
            $table->integer('cod_ballot');
            $table->string('face')->nullable();
            $table->boolean('unused')->default(0);
            $table->integer('service_station_id')->nullable();
            $table->integer('citizen_id')->nullable();
            $table->string('ballot_process')->nullable();
            $table->boolean('single')->default(0);
            $table->integer('user_id')->nullable();
            $table->integer('typeCreation')->nullable()->default(0);
            $table->string('situation');
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
