<?php

namespace App\Console\Commands;

use App\Models\ServiceStation;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ServiceStationExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'servicestation:expiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Blocks service station when the expiration date has been reached';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       
        $serviceStations = ServiceStation::where('type_of_post', ServiceStation::EVENTS_TYPE)
                           ->where('status', true)
                           ->get();

        foreach ($serviceStations as $key => $station) {
                $now = Carbon::now();
                $end_date = ($station->latest_event->start_date)->addDays($station->latest_event->expiry);
                if($now->gt($end_date)){ 
                    $station->status = false;
                    $station->save();
                }
        }
    }
}
