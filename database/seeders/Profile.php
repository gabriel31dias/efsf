<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Profile extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'name_profile' => "Teste perfil",
            'status' => true,
            'days_to_access_inspiration' => 1,
            'days_to_activity_lock' => 1
        ]);

        DB::table('profiles')->insert([
            'name_profile' => "Teste perfil2",
            'status' => true,
            'days_to_access_inspiration' => 1,
            'days_to_activity_lock' => 1
        ]);

        DB::table('profiles')->insert([
            'name_profile' => "Teste perfil3",
            'status' => true,
            'days_to_access_inspiration' => 1,
            'days_to_activity_lock' => 1
        ]);
    }
}
