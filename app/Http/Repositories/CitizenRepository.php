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

