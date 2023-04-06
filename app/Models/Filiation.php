<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiation extends Model
{
    use HasFactory;

    protected $guarded = []; 

    const TYPE_MATERNAL = 1; 
    const TYPE_PATERNAL = 2; 

    const TYPE_LABEL = [ 
        self::TYPE_MATERNAL => 'MATERNO', 
        self::TYPE_PATERNAL => 'PATERNO',
    ];

}
