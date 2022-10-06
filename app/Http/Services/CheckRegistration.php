<?php

namespace App\Http\Services;
use App\Models\Registry;


class CheckRegistration
{
    public function call($obj){

        if(!$this->checkCns($obj)){
            return false;
        }
        if(!$this->checkCns($obj)){
            return false;
        }
        if(!$this->checkCns($obj)){
            return false;
        }
        if(!$this->checkCns($obj)){
            return false;
        }

        return true;
    }

    public function checkCns($obj){
        $cns = Registry::where("cns", $obj["cns"])->first();
        return isset($cns->id) ? true : false;
    }

    public function checkBirthYear($obj){
        $deteBirth = explode("-", $obj['birth_date']);
        return $deteBirth[2] == $obj['birth_date'] ? true : false;
    }

    public function checkRegistroCv(){
        return true;
    }

}
