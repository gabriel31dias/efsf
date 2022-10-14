<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CitizenConflictExport implements FromArray, WithHeadings, WithMapping, ShouldAutoSize
{

    use Exportable;

    public function headings(): array
    {
        return [
            '#',
            'Nome',
            'CPF',
            'RG', 
            'Data de Nascimento', 
        ];
    }


    public function map($citizen): array
    {
        return [
            $citizen['id'],
            $citizen['name'],
            $citizen['cpf'],
            $citizen['rg'],
            $citizen['birth_date'],
        ];
    }

    protected $citizens;

    public function __construct(Collection $citizens)
    {
        $this->citizens = $citizens;
    }

    public function array(): array
    {
        return $this->citizens->toArray();
        
    }

}
