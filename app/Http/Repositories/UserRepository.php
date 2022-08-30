<?php

namespace App\Http\Repositories;
use App\Models\User;

class UserRepository {

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

}

