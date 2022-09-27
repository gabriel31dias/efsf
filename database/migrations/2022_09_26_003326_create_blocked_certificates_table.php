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
        Schema::create('blocked_certificates', function (Blueprint $table) {
            $table->id();
            $table->integer('registry_id');
            $table->integer('book_number');
            $table->string('book_letter');
            $table->string('sheet_number');
            $table->string('sheet_side');
            $table->string('registry_number');
            $table->string('note')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('blocked_certificates');
    }
};
