<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use OwenIt\Auditing\Contracts\Auditable;


class Citizen extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    protected $casts = [
        'id' => 'integer',
    ];

    const STATE_ACTIVE = 1;
    const STATE_INACTIVE = 2;
    const STATE_DECEASED = 3;

    const STATE_LABELS = [
        self::STATE_ACTIVE => 'ATIVO',
        self::STATE_INACTIVE => 'INATIVO',
        self::STATE_DECEASED => 'FALECIDO'
    ];

    const STATE_BADGE = [
        self::STATE_ACTIVE => 'bg-success',
        self::STATE_INACTIVE => 'bg-warning',
        self::STATE_DECEASED => 'bg-danger'
    ];

    

    const CERTIFICATE_TYPE = [ 
        "1" => "Casado",
        "2" => "Nascimento",
        "3" => "Igualdade",
        "4" => "Naturalização",
        "5" => "Casamento/Divorcio",
        "6" => "Casamento/Separação",
        "7" => "Casamento/Óbito",    
        "8" => "Nascimento no Exterior"
    ];
    
    public function filiations()
    {
        return $this->hasMany(Filiation::class);
    }

    public function uf(){
        return $this->belongsTo(Uf::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function registry(){ 
        return $this->belongsTo(Registry::class);
    }


    public function county(){
        return $this->belongsTo(County::class);
    }

    public function getFiliationsTextAttribute(){
        $text = '';
        foreach ($this->filiations as $key => $filiation) {
            $text.= $filiation->name;
        }
        return $text;
    }
    public function getFiliationsTextPrintAttribute(){
        $text = '';
        foreach ($this->filiations as $key => $filiation) {
           $text.= strtoupper($filiation->name) . ' E ';
        }
        
        return rtrim($text, "E ");
    }

    public function getTotalProcess(){
        $countProcess = Process::where('citizen_id', $this->id)->count();
        return $countProcess;
    }

    public function getBirthDateBrAttribute(){ 
        return Carbon::createFromFormat('Y-m-d', $this->birth_date)->format('d/m/Y');
    }

    public function getBiometricsB64Attribute(){ 
        $biometrics = json_decode($this->biometrics, 1);
        $arrReturn = [];
        foreach ($biometrics as $key => $value) {
           $data =  Storage::disk('local')->get($value);
           $arrReturn[$key] = base64_encode($data);
        }
        return $arrReturn;
    }

}
