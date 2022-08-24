<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cpf' => ['required', 'string', 'max:100'],
            'name' => ['required', 'string', 'max:100'],
            'zip_code' => ['string', 'max:100'],
            'address' => ['string', 'max:100'],
            'type_street' => ['integer'],
            'number' => ['required', 'string', 'max:20'],
            'complement' => ['string', 'max:100'],
            'district' => ['string', 'max:30'],
            'uf' => ['string', 'max:5'],
            'activate_date_time' => [''],
            'status' => ['required'],
            'cell' => ['required', 'string', 'max:15'],
            'mail' => ['required', 'string', 'max:50'],
            'user_name' => ['string', 'max:30'],
            'password' => ['password', 'max:30'],
            'profile_id' => ['string'],
        ];
    }
}
