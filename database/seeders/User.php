<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


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
            'cpf' => "8488848484",
            'name' => "adm",
            'zip_code' => "16903065",
            'address' => "rua passeio 834",
            'type_street' => "555959559",
            'number' => "959559595",
            'complement' => "dwwdadawdawd",
            'district' => "DWdwdwddw",
            'uf' => "sp",
            'status' => true,
            'cell' => "55995",
            'is_admin' => true,
            'email' => "email.admin@emaill.com",
            'user_name' => "admin",
            'password' => Hash::make("Rrr=003001"),
            'city' => "andradina",
            'profile_id' => 1
        ]);
    }
}
