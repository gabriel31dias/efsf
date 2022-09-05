<?php

namespace App\Http\Repositories;
use App\Models\Profile;

class ProfileRepository {

    public function findProfile($idProfile){
        if(!is_numeric($idProfile)){
            return false;
        }

        if($idProfile == ""){
            return false;
        }

      return Profile::where('id', $idProfile)->first() ?? null;
    }

    public function toggleStatus($id){
        $profile =  Profile::whereId($id)->first();
        return $profile = $profile->update([
            'status' => ! $profile->status
        ]);
    }
}

