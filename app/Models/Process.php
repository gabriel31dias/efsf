<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;
    protected $guarded = [];

    const SENT_TO_PCA = 0;
    const IN_REVIEW = 1;
    const DOCUMENT_PENDING = 1;
    const TYPO = 1;
    const DUPLICITY_OF_REGISTRATION = 1;
    const DOCUMENT_DISCREPANCY = 1;
    const APPLICANT_WITH_DUPLICATE_CERTIFICATE = 1;
    const RG_WITH_DUPLICATE_CERTIFICATES = 1;
    const CPF_DUPLICATE = 1;
    const AWAITING_OP_RESPONSA_EXTERNAL = 1;
    const RELEASED_FOR_PRINTING = 1;
    const ISSUED = 1;
    const SENT_TO_POST = 1;
    const HAND_OVER_TO_PERSON = 1;
    const FINISHED = 1;
    const CANCELED = 1;

    const SITUATION_TYPES = [
        self::SENT_TO_PCA => 'Enviado para PCA',
        self::IN_REVIEW => 'Em analise',
        self::DOCUMENT_PENDING => 'Pendente de documento(s)',
        self::TYPO => 'Erro de digitação',
        self::DUPLICITY_OF_REGISTRATION => 'Duplicidade de cadastro',
        self::DOCUMENT_DISCREPANCY => '',
        self::APPLICANT_WITH_DUPLICATE_CERTIFICATE => '',
        self::RG_WITH_DUPLICATE_CERTIFICATES => '',
        self::CPF_DUPLICATE => '',
        self::AWAITING_OP_RESPONSA_EXTERNAL => '',
        self::RELEASED_FOR_PRINTING => '',
        self::ISSUED => '',
        self::SENT_TO_POST => '',
        self::HAND_OVER_TO_PERSON => '',
        self::FINISHED => '',
        self::CANCELED => '',

    ];

    const FIXED_TYPE = 1;
    const EVENTS_TYPE = 2;

    const BIOMETRICS_STATUS_TYPES = [
        self::FIXED_TYPE => 'FIXO',
        self::EVENTS_TYPE => 'EVENTOS'
    ];

    public function citizen()
    {
        return $this->belongsToMany(Citizen::class);
    }

    public function serviceStation()
    {
        return $this->belongsToMany(ServiceStation::class);
    }
}
