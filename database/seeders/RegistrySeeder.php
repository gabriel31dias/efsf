<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registries')->insert([
            'sic_code' => "123",
            'cns' => "005074",
            'name' => "2º OFÍCIO DE NOTAS E ANEXOS",
            'fantasy_name' => "2º OFÍCIO DE NOTAS E ANEXOS",
            'uf_id' => 4,
            'county_id' => 209,
        ]);

        DB::table('registries')->insert([
            'sic_code' => "123",
            'cns' => "005116",
            'name' => "Cartório Jucá Cruz",
            'fantasy_name' => "Cartório Jucá Cruz",
            'uf_id' => 4,
            'county_id' => 209,
        ]);
    }
}
