<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'name_profil' => $this->name_profil,
            'status' => $this->status,
            'days_to_access_inspiration' => $this->days_to_access_inspiration,
            'days_to_activity_lock' => $this->days_to_activity_lock,
        ];
    }
}
