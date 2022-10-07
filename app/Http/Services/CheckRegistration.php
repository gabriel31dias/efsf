<?php

namespace App\Http\Services;
use App\Models\Registry;


class CheckRegistration
{
    public function call($obj){

        if(!$this->checkCns($obj)){
            return false;
        }

        if(!$this->checkBirthYear($obj)){
            return false;
        }

        if(!$this->checkTypeOfCertificate($obj)){
            return false;
        }

        if(!$this->checkCivilRegistration($obj)){
            return false;
        }

        return true;
    }

    public function checkCns($obj){
        $cns = Registry::where("cns", $obj["cns"])->first();
        return isset($cns->id) ? true : false;
    }

    public function checkBirthYear($obj){
        $deteBirth = explode("/", $obj['birth_date']);
        return $deteBirth[2] == $obj['birth_year'] ? true : false;
    }

    public function checkTypeOfCertificate($obj){
        return $obj['typeofcertificate'] == "1" || $obj['typeofcertificate'] == "2" ? true : false;
    }

    public function checkCivilRegistration($obj){
        return $obj['civilregistration'] == "55" ? true : false;
    }
}
