<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceStationResource extends JsonResource
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
            'service_station_name' => $this->service_station_name,
            'acronym_post' => $this->acronym_post,
            'type_of_post' => $this->type_of_post,
            'status' => $this->status,
            'cep' => $this->cep,
            'type_of_street' => $this->type_of_street,
            'address' => $this->address,
            'number' => $this->number,
            'complement' => $this->complement,
            'district' => $this->district,
            'uf' => $this->uf,
        ];
    }
}
