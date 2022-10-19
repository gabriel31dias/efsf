<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function feature_options() { 
        return $this->hasMany(FeatureOption::class)->orderBy('name');
    }

    public function getFeatureOptionsNamesAttribute(){ 
        return FeatureOption::where('feature_id', $this->id)->orderBy('name')->pluck('name')->toArray();
    }

}
