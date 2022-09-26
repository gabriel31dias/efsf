<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryTypeStreetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('country_type_streets')->insert([
            'name_type_street' => "Campo"
        ]);

        DB::table('country_type_streets')->insert([
            'name_type_street' => "Chácara"
        ]);

        DB::table('country_type_streets')->insert([
            'name_type_street' => "Colônia"
        ]);

        DB::table('country_type_streets')->insert([
            'name_type_street' => "Distrito"
        ]);

        DB::table('country_type_streets')->insert([
            'name_type_street' => "Esplanada"
        ]);


        DB::table('country_type_streets')->insert([
            'name_type_street' => "Estação"
        ]);

        DB::table('country_type_streets')->insert([
            'name_type_street' => "Estrada"
        ]);

        DB::table('country_type_streets')->insert([
            'name_type_street' => "Fazenda"
        ]);

        DB::table('country_type_streets')->insert([
            'name_type_street' => "Lago"
        ]);

        DB::table('country_type_streets')->insert([
            'name_type_street' => "Lagoa"
        ]);

        DB::table('country_type_streets')->insert([
            'name_type_street' => "Largo"
        ]);

        DB::table('country_type_streets')->insert([
            'name_type_street' => "Recanto"
        ]);

        DB::table('country_type_streets')->insert([
            'name_type_street' => "Sítio"
        ]);

        DB::table('country_type_streets')->insert([
            'name_type_street' => "Vale"
        ]);

        DB::table('country_type_streets')->insert([
            'name_type_street' => "Vereda"
        ]);

        DB::table('country_type_streets')->insert([
            'name_type_street' => "Vila"
        ]);
    }
}
