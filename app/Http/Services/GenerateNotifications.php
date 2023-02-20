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
            'title' => $obj['content'],
            'content' => $obj['content'],
            'resolution_url' => $obj['resolution_url'],
            'user_id_emiter' => $obj['user_id_emiter'],
            'user_id_receive' => $obj['user_receive'],
            'visualized' => false,
        ]);

        return $notf;   
    }
}
