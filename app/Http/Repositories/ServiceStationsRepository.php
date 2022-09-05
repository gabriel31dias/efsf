<?php

namespace App\Http\Repositories;
use App\Models\Profile;
use App\Models\UserServiceStation;
use App\Models\ServiceStation;


class ServiceStationsRepository {

    public function findServiceStations($userId){
        if(!is_numeric($userId)){
          return false;
        }

        if($userId == ""){
          return false;
        }

      return ServiceStation::whereIn('id', UserServiceStation::where('user_id', $userId)->get('service_station_id'))->get();
    }
}

