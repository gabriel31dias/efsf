<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cpf' => $this->cpf,
            'name' => $this->name,
            'zip_code' => $this->zip_code,
            'address' => $this->address,
            'type_street' => $this->type_street,
            'number' => $this->number,
            'complement' => $this->complement,
            'district' => $this->district,
            'uf' => $this->uf,
            'activate_date_time' => $this->activate_date_time,
            'status' => $this->status,
            'cell' => $this->cell,
            'email' => $this->email,
            'user_name' => $this->user_name,
            'profile_id' => $this->profile_id,
            'profile' => ProfileResource::make($this->whenLoaded('profile')),
        ];
    }
}
