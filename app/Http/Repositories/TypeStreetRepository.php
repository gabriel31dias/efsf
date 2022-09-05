<?php

namespace App\Http\Repositories;
use App\Models\User;
use App\Models\TypeStreet;


class TypeStreetRepository {

    public function createOrUpdateUser($id, $obj){
        $servicePoints = $obj['services_points'];
        unset($obj['services_points']);
        $user = User::updateOrCreate(['id' => $id ?? 0], $obj);

        if(isset($servicePoints) && count($servicePoints) > 0){
            foreach ($servicePoints as $value) {
                $user->userStations()->firstOrCreate([
                    "service_station_id" => $value['id'],
                ]);
            }
        }

        return $user;
    }

    public function findTypeStreet($idStreet){
        if(!is_numeric($idStreet)){
            return false;
        }

        if($idStreet == ""){
            return false;
        }
        return TypeStreet::where('id', $idStreet)->first();
    }

}

