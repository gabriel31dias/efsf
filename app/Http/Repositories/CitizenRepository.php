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


        $user = Citizen::updateOrCreate(['id' => $id ?? 0], $obj);

        if(isset($servicePoints) && count($servicePoints) > 0){
            foreach ($servicePoints as $value) {
                $user->userStations()->firstOrCreate([
                    "service_station_id" => $value['id'],
                ]);
            }
        }

        return $user;
    }



    public function checkMandatory($field){
        return in_array($field, $this->mandatoryFilds);
    }

    public function toggleStatus($user_id){
        $user =  User::whereId($user_id)->first();
        return $result = $user->update([
            'status' => ! $user->status
        ]);
    }

    public function toggleBlocked($user_id){
        $user =  User::whereId($user_id)->first();
        return $result = $user->update([
            'blocked' => ! $user->blocked
        ]);
    }


}

