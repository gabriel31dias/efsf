<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistryDate extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    protected $casts = [ 
        "created_date" => "date:d/m/Y", 
        "closing_date" => "date:d/m/Y",
    ];

}
