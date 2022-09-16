<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ufs')->insert([
            "id" => 1,
            "name" => "Acre",
            "acronym" => "AC"]); 
            
            DB::table('ufs')->insert([
            "id" => 2,
            "name" => "Alagoas",
            "acronym" => "AL"]); 
            
            DB::table('ufs')->insert([
            "id" => 3,
            "name" => "Amazonas",
            "acronym" => "AM"]); 
            
            DB::table('ufs')->insert([
            "id" => 4,
            "name" => "Amapá",
            "acronym" => "AP"]); 
            
            DB::table('ufs')->insert([
            "id" => 5,
            "name" => "Bahia",
            "acronym" => "BA"]); 
            
            DB::table('ufs')->insert([
            "id" => 6,
            "name" => "Ceará",
            "acronym" => "CE"]); 
            
            DB::table('ufs')->insert([
            "id" => 7,
            "name" => "Distrito Federal",
            "acronym" => "DF"]); 
            
            DB::table('ufs')->insert([
            "id" => 8,
            "name" => "Espírito Santo",
            "acronym" => "ES"]); 
            
            DB::table('ufs')->insert([
            "id" => 9,
            "name" => "Goiás",
            "acronym" => "GO"]); 
            
            DB::table('ufs')->insert([
            "id" => 10,
            "name" => "Maranhão",
            "acronym" => "MA"]); 
            
            DB::table('ufs')->insert([
            "id" => 11,
            "name" => "Minas Gerais",
            "acronym" => "MG"]); 
            
            DB::table('ufs')->insert([
            "id" => 12,
            "name" => "Mato Grosso do Sul",
            "acronym" => "MS"]); 
            
            DB::table('ufs')->insert([
            "id" => 13,
            "name" => "Mato Grosso",
            "acronym" => "MT"]); 
            
            DB::table('ufs')->insert([
            "id" => 14,
            "name" => "Pará",
            "acronym" => "PA"]); 
            
            DB::table('ufs')->insert([
            "id" => 15,
            "name" => "Paraíba",
            "acronym" => "PB"]); 
            
            DB::table('ufs')->insert([
            "id" => 16,
            "name" => "Pernambuco",
            "acronym" => "PE"]); 
            
            DB::table('ufs')->insert([
            "id" => 17,
            "name" => "Piauí",
            "acronym" => "PI"]); 
            
            DB::table('ufs')->insert([
            "id" => 18,
            "name" => "Paraná",
            "acronym" => "PR"]); 
            
            DB::table('ufs')->insert([
            "id" => 19,
            "name" => "Rio de Janeiro",
            "acronym" => "RJ"]); 
            
            DB::table('ufs')->insert([
            "id" => 20,
            "name" => "Rio Grande do Norte",
            "acronym" => "RN"]); 
            
            DB::table('ufs')->insert([
            "id" => 21,
            "name" => "Rondônia",
            "acronym" => "RO"]); 
            
            DB::table('ufs')->insert([
            "id" => 22,
            "name" => "Roraima",
            "acronym" => "RR"]); 
            
            DB::table('ufs')->insert([
            "id" => 23,
            "name" => "Rio Grande do Sul",
            "acronym" => "RS"]); 
            
            DB::table('ufs')->insert([
            "id" => 24,
            "name" => "Santa Catarina",
            "acronym" => "SC"]); 
            
            DB::table('ufs')->insert([
            "id" => 25,
            "name" => "Sergipe",
            "acronym" => "SE"]); 
            
            DB::table('ufs')->insert([
            "id" => 26,
            "name" => "São Paulo",
            "acronym" => "SP"]); 
            
            DB::table('ufs')->insert([
            "id" => 27,
            "name" => "Tocantins",
            "acronym" => "TO"]); 
                        
    }
}
