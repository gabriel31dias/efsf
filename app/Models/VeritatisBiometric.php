<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class VeritatisBiometric extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getBiometricsB64Attribute(){ 
        $biometrics = json_decode($this->biometrics, 1) ?? [];
        $arrReturn = [];
        foreach ($biometrics as $key => $value) {
           $data =  Storage::disk('local')->get($value);
           $arrReturn[$key] = base64_encode($data);
        }
        return $arrReturn;
    }
}
