<?php

namespace App\Http\Repositories;
use App\Models\Citizen;


class CitizenRepository {

    public $mandatoryFilds = [
        "name",
        "rg",
        "cpf",
        "celular"
    ];

    public function createOrUpdateCitizen($id, $obj){

        $erros = [];

        foreach ($obj as $field => $value)
        {
            if($this->checkMandatory($field) && empty(trim($value))) {
                array_push($erros, [
                    "message" => "O campo {$field} é obrigatorio"
                ] );
            }
        }

        if(count($erros) > 0){
            return $erros;
        }

        $certificate_entry_date = strtotime($obj["certificate_entry_date"]);
        $obj["certificate_entry_date"] = date('Y-m-d', $certificate_entry_date);


        $dou_certificate_date = strtotime($obj["dou_certificate_date"]);
        $obj["dou_certificate_date"] = date('Y-m-d', $dou_certificate_date);

        $obj['type_of_certificate'] = $obj['type_of_certificate'] == "" ? 0 : $obj['type_of_certificate'];
        $obj['term_number'] = $obj['term_number'] == "" ? 0 : $obj['term_number'];
        $obj['book_number'] = $obj['book_number'] == "" ? 0 : $obj['book_number'];
        $obj['forwarded_with_process'] = $obj['forwarded_with_process'] == "" ? 0 : $obj['forwarded_with_process'];
        $obj['uf_certificate'] = $obj['uf_certificate'] == "" ? 0 : $obj['uf_certificate'];
        $obj['county_certificate'] = $obj['county_certificate'] == "" ? 0 : $obj['county_certificate'];
        $obj['book_letter'] = $obj['book_letter'] == "" ? 0 : $obj['book_letter'];
        $obj['previous_registration_certificate'] = $obj['previous_registration_certificate'] == "" ? 0 : $obj['previous_registration_certificate'];
        $obj['matriculation'] = $obj['matriculation'] == "" ? 0 : $obj['matriculation'];
        $obj['previous_registration_certificate'] = $obj['previous_registration_certificate'] == "" ? 0 : $obj['previous_registration_certificate'];
        $obj['same_sex_marriage'] = $obj['same_sex_marriage'] == "" ? 0 : $obj['same_sex_marriage'];
        $obj['genre_biologic_id'] = $obj['genre_biologic_id'] == "" ? 0 : $obj['genre_biologic_id'];
        $obj['social_name_visible'] = $obj['social_name_visible'] == "" ? 0 : $obj['social_name_visible'];


        $obj['certificate'] = $obj['certificate'] == "" ? 0 : $obj['certificate'];
        $obj['migration_situation'] = $obj['migration_situation'] == "" ? null : $obj['migration_situation'];
        $obj['social_indicator_id'] = $obj['social_indicator_id'] == "" ? null : $obj['social_indicator_id'];

        $citizen = Citizen::find($id);

        if(isset($citizen->id)){
            $user = $citizen->update($obj);
        }else{
            $user = Citizen::create($obj);
        }

        return $user;
    }

    public function checkMandatory($field){
        return in_array($field, $this->mandatoryFilds);
    }
}

