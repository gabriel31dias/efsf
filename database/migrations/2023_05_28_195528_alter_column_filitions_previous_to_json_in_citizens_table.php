<?php

use App\Models\Citizen;
use App\Models\Filiation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        $citizens = Citizen::all(); 
        foreach ($citizens as $key => $citizen) {
            $filitions = explode(",", $citizen->filitions_previous); 
                if(!empty($filitions)){ 
                $obj = [];
                foreach ($filitions as $key => $filiation) {
                    $obj[] = ['name' => $filiation, 'type' => Filiation::TYPE_MATERNAL];
                }
                $citizen->filitions_previous = json_encode($obj);
                $citizen->save();
            }
        }

        DB::statement('ALTER TABLE citizens ALTER COLUMN filitions_previous TYPE JSON USING filitions_previous::JSON');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE citizens ALTER COLUMN filitions_previous TYPE TEXT');

    }
};
