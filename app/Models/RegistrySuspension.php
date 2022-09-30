<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistrySuspension extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [ 
        "start_date" => "date:Y-m-d", 
        "end_date" => "date:Y-m-d",
    ];

    protected $guarded = [

    ];

    public function registry()
    {
        return $this->belongsTo(Registry::class);
    }}
