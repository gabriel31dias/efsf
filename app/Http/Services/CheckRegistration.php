<?php

namespace App\Http\Services;
use App\Models\Registry;
use App\Models\RegistryDate;
use Carbon\Carbon;

class CheckRegistration
{
    public function call($obj){

        dd($this->checkRegistryDates($obj));
        if($this->checkRegistryDates($obj)){
            return false;
        }

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


    public function checkRegistryDates($obj){
        $getDateRegistry = RegistryDate::where('registry_id', $obj['registry']->id)->get();
        $dou_certificate_date = explode('/', $obj['dou_certificate_date']);
        $dou_certificate_date =   $dou_certificate_date[2]."-".$dou_certificate_date[1]."-".$dou_certificate_date[0];

        $certificate_entry_date = explode('/', $obj['certificate_entry_date']);
        $certificate_entry_date =   $certificate_entry_date[2]."-".$certificate_entry_date[1]."-".$certificate_entry_date[0];

        $certificate_entry_date = Carbon::parse($certificate_entry_date);

        $dou_certificate_date = Carbon::parse($dou_certificate_date);

        dd($certificate_entry_date);

        if($getDateRegistry[0]->created_date <= $dou_certificate_date && $getDateRegistry[0]->closing_date >= $dou_certificate_date){
            $returnVarDou_certificate_date = true;
        }else{
            $returnVarDou_certificate_date = false;
        }

        if($getDateRegistry[0]->created_date <= $certificate_entry_date && $getDateRegistry[0]->closing_date >= $certificate_entry_date){
            $returnVarCertificate_entry_date = true;
        }else{
            $returnVarCertificate_entry_date = false;
        }

        return $returnVarDou_certificate_date == $returnVarCertificate_entry_date ? true : false;
    }

    public function checkCns($obj){
        $cns = Registry::where("cns", $obj["cns"])->first();
        return isset($cns->id) ? true : false;
    }

    public function checkBirthYear($obj){
        dd( $obj['birth_date']);
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
