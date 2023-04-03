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
        Schema::create('director_signatures', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(true);
            $table->string('file_signature');
            $table->string('file_appointment_or_dismissal')->nullable();
            $table->boolean('enabled')->default(true);
            $table->integer('user_id');
            $table->integer('unit_id');
            $table->timestamp('date_active')->nullable();
            $table->timestamp('date_inactive')->nullable();
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
        Schema::dropIfExists('access_dispatches');
    }
};
