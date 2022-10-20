<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = Feature::create([
            'name' => "Cútis"
        ]);

        DB::table('feature_options')->insert([
            'name' => "Branco",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Preto",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Pardo",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Amarelo",
            'feature_id' => $result->id
        ]);

        $result = Feature::create([
            'name' => "Cor do Cabelo "
        ]);

        DB::table('feature_options')->insert([
            'name' => "Castanho claro",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Castanho escuro",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Grisalhos",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Louro",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Preto",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Ruivos",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Pintados",
            'feature_id' => $result->id
        ]);

        $result = Feature::create([
            'name' => "Tipo de cabelo"
        ]);

        DB::table('feature_options')->insert([
            'name' => "Carapinhas",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Crespos",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Encaracolados",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Lisos",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Ondulados",
            'feature_id' => $result->id
        ]);


        $result = Feature::create([
            'name' => "Cor dos Olhos"
        ]);


        DB::table('feature_options')->insert([
            'name' => "Azul",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Castanho",
            'feature_id' => $result->id
        ]);


        DB::table('feature_options')->insert([
            'name' => "Duas cores",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Verdes",
            'feature_id' => $result->id
        ]);

        $result = Feature::create([
            'name' => "Tipos dos Olhos"
        ]);

        DB::table('feature_options')->insert([
            'name' => "GRANDES",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "NORMAIS",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "ORIENTAIS",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "PEQUENOS E REDONDOS",
            'feature_id' => $result->id
        ]);

        $result = Feature::create([
            'name' => "Amputação"
        ]);

        DB::table('feature_options')->insert([
            'name' => "Orelha esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Braço direito",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Braço direito",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Braço esquerdo",
            'feature_id' => $result->id
        ]);


        DB::table('feature_options')->insert([
            'name' => "Mão direita",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Mão esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Perna direita",
            'feature_id' => $result->id
        ]);


        DB::table('feature_options')->insert([
            'name' => "Perna esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Pé direito",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Pé esquerdo",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Dedo/s mão direita",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Dedo/s mão esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Não possui",
            'feature_id' => $result->id
        ]);


        $result = Feature::create([
            'name' => "Anomalia"
        ]);

        DB::table('feature_options')->insert([
            'name' => "Anquilose",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Ectrodactilia",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Macrodactilia",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Polidactilia",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Amputação",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Microdactilia",
            'feature_id' => $result->id
        ]);


        DB::table('feature_options')->insert([
            'name' => "Sindactilia",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Hipoplasia",
            'feature_id' => $result->id
        ]);

        $result = Feature::create([
            'name' => "Cicatriz"
        ]);

        DB::table('feature_options')->insert([
            'name' => "Testa",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Face/cabeça lado direito",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Face/cabeça lado esquerdo",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Lábio superior",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Lábio inferior",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Queixo",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Pescoço",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Braço direito",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Braço esquerdo",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Mão direita",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Mão esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Mão esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Mão esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Dedo/s mão esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Tronco frente",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Tronco costa",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Perna esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Perna direita",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Perna direita",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Pé esquerdo",
            'feature_id' => $result->id
        ]);

        $result = Feature::create([
            'name' => "Deformidade"
        ]);

        DB::table('feature_options')->insert([
            'name' => "Pé esquerdo",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Pé esquerdo",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Corcunda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Dentuça",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Dedo/s mão direita",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Dedo/s mão esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Estrábico",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Faltando olho/s",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Mão direita",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Mão esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Mudo",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Pé direito",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Pé esquerdo",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Perna esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Perna direita",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Paralisia facial",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Síndrome de down",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Lábios leporinos",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Cego",
            'feature_id' => $result->id
        ]);


        $result = Feature::create([
            'name' => "Tatuagem"
        ]);

        DB::table('feature_options')->insert([
            'name' => "Braço direito",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Braço esquerdo",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Dedo/s mão direita",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Dedo/s mão esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Face/cabeça lado direito",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Face/cabeça lado esquerdo",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Mão direita",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Mão esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Pé direito",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Pé esquerdo",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Perna esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Perna direita",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Tronco frente",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Tronco costa",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Pescoço",
            'feature_id' => $result->id
        ]);


        $result = Feature::create([
            'name' => "Tatuagem"
        ]);

        DB::table('feature_options')->insert([
            'name' => "Braço direito",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Braço esquerdo",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Dedo/s mão direita",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Dedo/s mão esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Face/cabeça lado direito",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Face/cabeça lado esquerdo",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Mão direita",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Mão esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Pé direito",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Pé esquerdo",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Perna esquerda",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Perna direita",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Tronco frente",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Tronco costa",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Pescoço",
            'feature_id' => $result->id
        ]);

        $result = Feature::create([
            'name' => "Peculiaridades"
        ]);

        DB::table('feature_options')->insert([
            'name' => "Canhoto",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Careca",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Dente/s de ouro",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Desdentado",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Gago",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Sotaque estrangeiro",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Sotaque regional",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Tiques e cacoetes",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Usa bengala",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Usa brinco",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Uso de gíria",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Usa óculos",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Usa peruca",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Uso de gíria",
            'feature_id' => $result->id
        ]);

        DB::table('feature_options')->insert([
            'name' => "Usa óculos",
            'feature_id' => $result->id
        ]);
    }
}
