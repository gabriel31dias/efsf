<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceStationEvent extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    protected $casts = [ 
        "start_date" => "date:d/m/Y", 
        "delivery_date" => "date:d/m/Y",
    ];
    
}
