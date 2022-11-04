<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('marital_statuses')->insert([
            'name' => "solteiro"
        ]);

        DB::table('marital_statuses')->insert([
            'name' => "casado",
        ]);

        DB::table('marital_statuses')->insert([
            'name' => "separado",
        ]);

        DB::table('marital_statuses')->insert([
            'name' => "divorciado",
        ]);

        DB::table('marital_statuses')->insert([
            'name' => "‘viúvo",
        ]);

        DB::table('marital_statuses')->insert([
            'name' => "amigado",
        ]);

        DB::table('marital_statuses')->insert([
            'name' => "concubinato",
        ]);

        DB::table('marital_statuses')->insert([
            'name' => "união estável",
        ]);

    }
}
