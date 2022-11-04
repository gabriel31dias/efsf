<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class County extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function uf(){ 
        return $this->belongsTo(Uf::class);
    }

    public function county(){ 
        return $this->belongsTo(County::class);
    }

    public function GetIsDistrictAttribute()
    {
        return isset($this->county_id);
    }

}
