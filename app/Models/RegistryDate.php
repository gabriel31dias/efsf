<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistryDate extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [

    ];

    protected $casts = [ 
        "created_date" => "date:d/m/Y", 
        "closing_date" => "date:d/m/Y",
        "unincorporated_date" => "date:d/m/Y", 
        "incorporated_date" => "date:d/m/Y",
    ];

    public function incorporated_registry()
    {
        return $this->belongsTo(Registry::class, 'incorporated_registry_id');
    }

}
