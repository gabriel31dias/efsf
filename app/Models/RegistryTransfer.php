<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistryTransfer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function origin()
    {
        return $this->belongsTo(Registry::class, 'registry_origin_id');
    }

    public function destination()
    {
        return $this->belongsTo(Registry::class, 'registry_destination_id');
    }

}
