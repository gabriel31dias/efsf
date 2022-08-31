<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_profile' => ['required', 'string', 'max:100'],
            'status' => ['required'],
            'days_to_access_inspiration' => ['required', 'integer'],
            'days_to_activity_lock' => ['required', 'integer'],
        ];
    }
}
