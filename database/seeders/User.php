<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'cpf' => '480001582817',
            'name' => "Gabriel Dias",
            'zip_code' => "342243243234",
            'address' => "rua portugal",
            'type_street' =>  "1",
            'number' => "2213213",
            'complement' => "wdwd",
            'district' => "andradina",
            'uf' => "sp",
            'status' => true,
            'cell' => "18996734664",
            'email' => "gaqwqwqw@ga.cm",
            'user_name' => "dawddaw",
            'password' => "dwadaw"
        ]);

        DB::table('users')->insert([
            'cpf' => '480001582817',
            'name' => "Gabriel Dias",
            'zip_code' => "342243243234",
            'address' => "rua portugal",
            'type_street' =>  "1",
            'number' => "2213213",
            'complement' => "wdwd",
            'district' => "andradina",
            'uf' => "sp",
            'status' => true,
            'cell' => "18996734664",
            'email' => "ga@gadd.cm",
            'user_name' => "dawddaw",
            'password' => "dwadaw"
        ]);
        DB::table('users')->insert([
            'cpf' => '480001582817',
            'name' => "Gabriel Dias",
            'zip_code' => "342243243234",
            'address' => "rua portugal",
            'type_street' =>  "1",
            'number' => "2213213",
            'complement' => "wdwd",
            'district' => "andradina",
            'uf' => "sp",
            'status' => true,
            'cell' => "18996734664",
            'email' => "gaddd@ga.cm",
            'user_name' => "dawddaw",
            'password' => "dwadaw"
        ]);
    }
}
