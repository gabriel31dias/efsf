<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ballot extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    const TYPE_BATCH_REGISTER = 1;
    const TYPE_SINGLE_REGISTRATION = 2;
    const TYPE_RELOCATION = 3;
    const TYPE_SEARCH = 4;
    const TYPE_TOTALIZATION = 5;
    const TYPE_DISABLEMENT = 6;


    const TYPE_CREATION_BALLOT = [
        self::TYPE_BATCH_REGISTER => 'cadastro-lote',
        self::TYPE_SINGLE_REGISTRATION => 'cadastro-avulso',
        self::TYPE_RELOCATION => 'remanejamento',
        self::TYPE_SEARCH => 'pesquisa',
        self::TYPE_TOTALIZATION => 'totalizacao',
        self::TYPE_DISABLEMENT => 'inutilizacao'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function serviceStation()
    {
        return $this->belongsTo(ServiceStation::class);
    }
}
