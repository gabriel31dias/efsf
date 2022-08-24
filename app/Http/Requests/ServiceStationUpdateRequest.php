<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStationUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'service_station_name' => ['required', 'string', 'max:50'],
            'acronym_post' => ['required', 'string', 'max:15'],
            'type_of_post' => ['required', 'integer'],
            'status' => ['required'],
            'cep' => ['required', 'string', 'max:30'],
            'type_of_street' => ['required', 'integer'],
            'address' => ['required', 'string', 'max:50'],
            'number' => ['required', 'string', 'max:20'],
            'complement' => ['required', 'string', 'max:50'],
            'district' => ['required', 'string', 'max:50'],
            'uf' => ['required', 'string', 'max:30'],
        ];
    }
}
