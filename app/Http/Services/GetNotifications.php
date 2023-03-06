<?php

namespace App\Http\Services;
use App\Models\Notification;
use App\Models\Process;
use App\Models\Registry;
use App\Models\Dispatch;
use App\Models\RegistryDate;
use Carbon\Carbon;

class GetNotifications
{
  
    public function call($obj){ 

        if (isset($obj['service_stations'])){
            $serviceStationIds = array_map(function ($item) {
                return $item['service_station_id'];
            }, $obj['service_stations']);
        }
       
        $getItems = Notification::where(['user_id_receive' => $obj['user_id_receive']])
        ->take(5)
        ->orderBy('id', 'desc')->get();

        if(count($getItems) == 0){
            $getItems = Notification::whereIn('service_station_id',  $serviceStationIds ?? [])
            ->take(5)
            ->orderBy('id', 'desc')->get();
        }

        $unseenNotificationExists = $getItems->contains('visualized', false);
        $new_notification = false;

        if ($unseenNotificationExists) {
           $new_notification = true;
        }

        return  [
            "notifications" => $getItems,
            "new_notification" => $new_notification
        ];      
    }
}
