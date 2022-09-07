<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceStations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_stations')->insert([
            'service_station_name' => 'teste station',
            'type_of_post' => 1,
            'status' => true,
            'cep' => "rua portugal",
            'acronym_post' => 'dwwd',
            'type_of_street' => "2213213",
            'address' => "2213213",
            'number' => "2213213",
            'complement' => "2213213",
            'district' => "2213213",
            'uf' => "2213213",
            'city' => "Andradina",
            'start_hour' => "08:00:00",
            'end_hour' => "18:00:00"
            
        ]);

        DB::table('service_stations')->insert([
            'service_station_name' => 'teste station 1',
            'type_of_post' => 1,
            'status' => true,
            'cep' => "rua portugal",
            'acronym_post' => 'dwwd',
            'type_of_street' => "2213213",
            'address' => "2213213",
            'number' => "2213213",
            'complement' => "2213213",
            'district' => "2213213",
            'uf' => "2213213",
            'city' => "São paulo",
            'start_hour' => "08:00:00",
            'end_hour' => "18:00:00"
        ]);

        DB::table('service_stations')->insert([
            'service_station_name' => 'teste station 2',
            'type_of_post' => 1,
            'status' => true,
            'cep' => "rua portugal",
            'acronym_post' => 'dwwd',
            'type_of_street' => "2213213",
            'address' => "2213213",
            'number' => "2213213",
            'complement' => "2213213",
            'district' => "2213213",
            'uf' => "2213213",
            'city' => "São Paulo",
            'start_hour' => "08:00:00",
            'end_hour' => "18:00:00"
        ]);

        DB::table('service_stations')->insert([
            'service_station_name' => 'teste station 3',
            'type_of_post' => 1,
            'status' => true,
            'cep' => "rua portugal",
            'acronym_post' => 'dwwd',
            'type_of_street' => "2213213",
            'address' => "2213213",
            'number' => "2213213",
            'complement' => "2213213",
            'district' => "2213213",
            'uf' => "2213213",
            'city' => "São Paulo",
            'start_hour' => "08:00:00",
            'end_hour' => "18:00:00"
        ]);
    }
}
