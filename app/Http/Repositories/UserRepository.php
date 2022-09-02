<?php

namespace App\Http\Repositories;
use App\Models\User;

class UserRepository {

    public function createOrUpdateUser($id, $obj){
        $servicePoints = $obj['services_points'];
        if($obj['type_street'] == ""){
            unset($obj['type_street']);
        }
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

