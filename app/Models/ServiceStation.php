<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceStation extends Model
{
    use HasFactory;
    const FIXED_TYPE = 1;
    const EVENTS_TYPE = 2;
    
    const LABEL_TYPES = [ 
        self::FIXED_TYPE => 'FIXO', 
        self::EVENTS_TYPE => 'EVENTOS'   
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [

    ];

    public function delivery_point()
    {
        return $this->belongsTo(ServiceStation::class, 'delivery_post_id');
    }

    public function events()
    {
        return $this->hasMany(ServiceStationEvent::class, 'service_station_id');
    }
    
}
