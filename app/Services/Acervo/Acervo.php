<?php

namespace App\Services\Acervo;

use App\Models\Citizen;
use Carbon\Carbon;

class Acervo
{

    /* 
        1. Busca ACERVO LOCAL (SICWEB)
        2. BUSCA ACERVO ANTIGO (FAZ A CONSULTA EM AMBOS OS ACERVOS ANTIGOS ATRAVES DA API )
        3. Busca INRC
    */
    public function searchCitizens($rg, $cpf,$name): array
    {
        $responseSicWeb = $this->searchSicWeb($rg, $cpf, $name);
        if ($responseSicWeb['success']) {
            return $responseSicWeb;
        }

        $responseApi = $this->searchApiAcervo($rg);
        if ($responseApi['success']) {
            return $responseApi;
        }
        return ["success" => false, "citizens" => null];
    }

    private function searchSicWeb($rg, $cpf, $name)
    {
        $citizens = new Citizen();

        if ($rg) {
            $citizens = $citizens->where('rg', 'ilike', '%' . $rg . '%');
        }

        if ($rg) {
            $citizens = $citizens->where('rg', 'ilike', '%' . $rg . '%');
        }

        if ($name) {
            $citizens = $citizens->where('name', 'ilike', '%' . $name . '%');
        }

        $citizens = $citizens->limit(10)->get();

        if (sizeof($citizens)) {
            return ["success" => true, "citizens" => $citizens];
        } else {
            return ["success" => false, "citizens" => null];
        }
    }

    private function searchApiAcervo($rg)
    {
        $apiAcervo = new ApiAcervoAntigo();
        $citizen =  $apiAcervo->getAcervo($rg);

        if ($citizen) {
            $citizen = $this->instanceCitizen($citizen);
            return ["success" => true, "citizens" => [$citizen]];
        } else {
            return ["success" => false, "citizens" => null];
        }
    }

    private function instanceCitizen(array $citizenArr)
    {
        if(key_exists("DATNAS", $citizenArr)) { 
            $citizenArr["DATA_NASCIMENTO"] = Carbon::createFromDate($citizenArr["DATNAS"])->format('d/m/Y');
            $citizenArr["RESIDENCIA"] = $citizenArr["ENDE"];
            $citizenArr["SITUACAO_RG"] = $citizenArr["STATUS"];
            $citizenArr["NOME_ANTERIOR"] = $citizenArr["NOMANTCID"]; 
            $citizenArr["UF_NATURALIDADE"] = $citizenArr["UF"];
            $citizenArr["PAIS"] = $citizenArr["NOMPAIS"];

        }
        $citizen = new CitizenSicOld();
        $citizen->setAttributes($citizenArr);

        return $citizen;
    }

   
}
