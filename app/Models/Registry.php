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
 }
