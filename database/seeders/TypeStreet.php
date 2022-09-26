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
            'name_type_street' => "Aeroporto"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Alameda"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Área"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Avenida"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Condomínio"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Conjunto"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Estação"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Favela"
        ]);


        DB::table('type_streets')->insert([
            'name_type_street' => "Jardim"
        ]);


        DB::table('type_streets')->insert([
            'name_type_street' => "Ladeira"
        ]);


        DB::table('type_streets')->insert([
            'name_type_street' => "Lago"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Largo"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Loteamento"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Morro"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Núcleo"
        ]);


        DB::table('type_streets')->insert([
            'name_type_street' => "Parque"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Passarela"
        ]);


        DB::table('type_streets')->insert([
            'name_type_street' => "Pátio"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Praça"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Quadra"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Residencial"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Rodovia"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Rua"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Setor"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Travessa"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Trecho"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Trevo"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Via"
        ]);
        DB::table('type_streets')->insert([
            'name_type_street' => "Viaduto"
        ]);

        DB::table('type_streets')->insert([
            'name_type_street' => "Viela"
        ]);
    }
}
