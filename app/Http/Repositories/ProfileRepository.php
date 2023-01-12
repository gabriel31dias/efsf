<?php

namespace App\Http\Repositories;
use App\Models\Unit;

class ProfileRepository {

    public function findProfile($idProfile){
        if(!is_numeric($idProfile)){
            return false;
        }

        if($idProfile == ""){
            return false;
        }

      return Unit::where('id', $idProfile)->first() ?? null;
    }

    public function toggleStatus($id){
        $profile =  Unit::whereId($id)->first();
        return $profile = $profile->update([
            'status' => ! $profile->status
        ]);
    }
}

