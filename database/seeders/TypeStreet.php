<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeStreet extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_streets')->insert([
            'name_type_street' => "aeroporto"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "alameda"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "área"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "avenida"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "campo"
        ]);


        DB::table('type_streets')->insert([
            'name_type_street' => "chácara"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "colônia"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "condomínio"
        ]);


        DB::table('type_streets')->insert([
            'name_type_street' => "conjunto"
        ]);


        DB::table('type_streets')->insert([
            'name_type_street' => "distrito"
        ]);


        DB::table('type_streets')->insert([
            'name_type_street' => "esplanada"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "estação"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "estrada"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "favela"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "fazenda"
        ]);


        DB::table('type_streets')->insert([
            'name_type_street' => "feira"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "ladeira"
        ]);


        DB::table('type_streets')->insert([
            'name_type_street' => "lago"
        ]);
    }
}
