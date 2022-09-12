<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ufs')->insert([
            'name' => "são paulo",
            "acronym" => "sp"
        ]);

        DB::table('ufs')->insert([
            'name' => "mato Grosso do sul",
            "acronym" => "ms"
        ]);
    }
}
