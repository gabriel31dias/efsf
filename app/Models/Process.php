<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;
    protected $guarded = [];

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
        self::AWAITING_OP_RESPONSA_EXTERNAL => '',
        self::RELEASED_FOR_PRINTING => '',
        self::ISSUED => '',
        self::SENT_TO_POST => '',
        self::HAND_OVER_TO_PERSON => '',
        self::FINISHED => '',
        self::CANCELED => '',

    ];

    const BIOMETRICS_STATUS_TYPES = [
        self::FIXED_TYPE => 'FIXO',
        self::EVENTS_TYPE => 'EVENTOS'
    ];


}
