<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryTypeStreat extends Model
{
    public $table = "country_type_streets";
    use HasFactory;
    protected $guarded = [];
}
