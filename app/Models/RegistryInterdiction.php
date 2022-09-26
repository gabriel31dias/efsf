<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistryInterdiction extends Model
{
    use HasFactory;

    protected $casts = [ 
        "start_date" => "date:Y-m-d", 
        "end_date" => "date:Y-m-d",
    ];

    protected $guarded = [

    ];

    public function registry()
    {
        return $this->belongsTo(Registry::class);
    }

}
