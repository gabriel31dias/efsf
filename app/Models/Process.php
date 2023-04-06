<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Process extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $guarded = [];


    const SENT_TO_PCA = 1;
    const IN_REVIEW = 2;
    const PENDING_DOCUMENT = 3;
    const TYPO = 4;
    const DUPLICATION_OF_REGISTRATION_RG = 4;
    const DOCUMENT_DISCRPANCY = 5;
    const APPLICANT_WITH_DUPLICATE_CERTIFICATE = 6;
    const RGS_WITH_DUPLICATE_CERTIFICATES= 7;
    const CPF_DUPLICATE = 8;
    const AWAITING_REPOSE_FROM_OF_EXTERNAL= 9;
    const RELEASED_FOR_PRINTING = 10;
    const RELEASED_FOR_REPRINT = 11;
    const ISSUED = 12;
    const SENT_TO_THE_POST = 13;
    const DELIVERED_AT_THE_POST = 14;
    const HAND_OVER_TO_THE_POST_PERSON_IN_CHARGE = 14;
    const RECEIVED_BY_THE_POST_RESPONSIBLE_AND_FINALIZED_DELIVERED = 15;
    const CANCELED = 16;

    const SITUATION_TYPES_LABELS = [
        self::SENT_TO_PCA => 'Enviado para PCA',
        self::IN_REVIEW => 'Em analise',
        self::PENDING_DOCUMENT => 'Pendente de documento(s)',
        self::TYPO => 'Erro de digitação',
        self::DUPLICATION_OF_REGISTRATION_RG => 'Duplicidade de cadastro-RG',
        self::DOCUMENT_DISCRPANCY  => 'Divergência de documento',
        self::APPLICANT_WITH_DUPLICATE_CERTIFICATE => 'Requerente com duplicidade de certidão',
        self::RGS_WITH_DUPLICATE_CERTIFICATES => 'RG’s com duplicidades de certidão',
        self::CPF_DUPLICATE => 'Duplicidade de CPF',
        self::AWAITING_REPOSE_FROM_OF_EXTERNAL => 'aguardando resposta de OF. externo',
        self::RELEASED_FOR_PRINTING => 'liberado para impressão',
        self::RELEASED_FOR_REPRINT => 'liberado para reimpressão',
        self::ISSUED => 'emitido',
        self::SENT_TO_THE_POST => 'enviado para o posto',
        self::DELIVERED_AT_THE_POST => 'entregue no posto',
        self::HAND_OVER_TO_THE_POST_PERSON_IN_CHARGE => 'Entregue ao posto/responsável',
        self::RECEIVED_BY_THE_POST_RESPONSIBLE_AND_FINALIZED_DELIVERED => 'recebido pelo posto/responsável e finalizado(entregue)',
        self::CANCELED => 'Anulado',
    ];


    const PENDING = 1;
    const VALID = 2;

    const PROCESSING = 3;

    const BIOMETRICS_STATUS_TYPES = [
        self::PENDING => 'Pendente',
        self::VALID => 'Válido',
        self::PROCESSING => 'Processando'
    ];


    const PAYMENT_FREE = 1;
    const PAYMENT_PENDING = 2;

    const PAYMENT_PAID_OUT = 3;

    const PAYMENT_STATUS = [
        self::PAYMENT_FREE => 'Isento',
        self::PAYMENT_PENDING => 'pendente',
        self::PAYMENT_PAID_OUT => 'pago'
    ];

    const PAYMENT_EXEMPTION_TYPES = [ 
        'ALFABETIZADO',
        'BENEFICIÁRIOS DE SERVIÇOS SOCIAIS ASSISTENCIAIS',
        'CATASTROFE DA NATUREZA',
        'CUSTODIA DE ORGÃOS PÚBLICOS',
        'PORTADORES DE NECESSIDADES ESPECIAIS',
        'ESTATUTO DO IDOSO "MAIOR DE 60 ANOS"', 
        'ROUBO OU FURTO (30 DIAS CONTADOS DO REGISTROS POLICIAL)'
    ];

    public function citizen()
    {
        return $this->belongsTo(Citizen::class);
    }

    public function getSituation()
    {
        return self::SITUATION_TYPES_LABELS[$this->situation];
    }

    public function getBiometriStatus()
    {
        return self::BIOMETRICS_STATUS_TYPES[$this->biometrics_status];
    }

    public function getPaymentStatus()
    {
        return self::PAYMENT_STATUS[$this->payment];
    }

    public function serviceStation()
    {

        return $this->belongsTo(ServiceStation::class, 'service_station_id');

    }
}
