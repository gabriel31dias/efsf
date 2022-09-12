<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'name' => "feminino"
        ]);

        DB::table('genres')->insert([
            'name' => "masculino"
        ]);

        DB::table('genres')->insert([
            'name' => "não binario"
        ]);

        DB::table('genres')->insert([
            'name' => "outros"
        ]);
    }
}
