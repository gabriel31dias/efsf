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
        Schema::table('features', function (Blueprint $table) {
            $table->integer('order')->nullable();
        });

        $features = Feature::orderBy('id', 'asc')->get();
        for ($i=0; $i < sizeof($features) ; $i++) { 
            $features[$i]->order = $i + 1; 
            $features[$i]->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('features', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
};
