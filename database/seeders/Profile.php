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
            'name_profile' => "analista",
            'status' => true,
            'days_to_access_inspiration' => 100000,
            'days_to_activity_lock' => 10000
        ]);


        DB::table('profiles')->insert([
            'name_profile' => "atendente",
            'status' => true,
            'days_to_access_inspiration' => 10000,
            'days_to_activity_lock' => 100000
        ]);


        DB::table('profile_permission')->insert([
            'profile_id' => 3,
            'permission_id' => 39
        ]);


        DB::table('profile_permission')->insert([
            'profile_id' => 3,
            'permission_id' => 40
        ]);


        DB::table('profile_permission')->insert([
            'profile_id' => 3,
            'permission_id' => 41
        ]);

        DB::table('profile_permission')->insert([
            'profile_id' => 2,
            'permission_id' => 50,
        ]);


        DB::table('profile_permission')->insert([
            'profile_id' => 2,
            'permission_id' => 51,
        ]);


        DB::table('profile_permission')->insert([
            'profile_id' => 2,
            'permission_id' => 52,
        ]);





    }
}
