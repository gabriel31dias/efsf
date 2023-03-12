<?php

namespace App\Http\Services;
use App\Models\Notification;
use App\Models\Process;
use App\Models\Registry;
use App\Models\Dispatch;
use App\Models\RegistryDate;
use Carbon\Carbon;

class GenerateNotifications
{
    public function call($obj){
      
        $notf = Notification::create([
            'title' => $obj['title'],
            'content' => $obj['content'],
            'resolution_url' => $obj['resolution_url'],
            'user_id_emiter' => $obj['user_id_emiter'],
            'user_id_receive' => $obj['user_receive'] ?? null,
            'service_station_id' => $obj['service_station_id'] ?? null,    
            'visualized' => false,
            'citizen_id' => $obj['citizen_id'] ?? '',
            'type' =>  $obj['type'] ?? '',
        ]);

        return $notf;   
    }
}
