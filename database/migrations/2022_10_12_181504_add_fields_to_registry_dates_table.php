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
        Schema::table('registry_dates', function (Blueprint $table) {
            $table->date('incorporated_date')->nullable();
            $table->date('unincorporated_date')->nullable();
            $table->integer('collection_number')->nullable();
            $table->integer('incorporated_registry_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registry_dates', function (Blueprint $table) {
            $table->dropColumn('incorporated_date');
            $table->dropColumn('unincorporated_date');
            $table->dropColumn('collection_number');
            $table->dropColumn('incorporated_registry_id');
        });
    }
};
