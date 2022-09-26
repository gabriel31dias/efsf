<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registry extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = [

    ];

    public function opening_dates() { 
        return $this->hasMany(RegistryDate::class);
    }

    public function uf(){ 
        return $this->belongsTo(Uf::class);
    }

    public function county(){ 
        return $this->belongsTo(County::class);
    }

    public function interdictions()
    {
        return $this->hasMany(RegistryInterdiction::class);
    }

    public function blocked_certificates()
    {
        return $this->hasMany(BlockedCertificate::class);
    }
 }
