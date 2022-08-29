<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserServiceStation extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function station()
    {
        return $this->belongsTo('App\Models\ServiceStation', 'service_station_id', 'id');
    }

}
