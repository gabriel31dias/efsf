<?php

namespace App\Http\Services;
use App\Models\Registry;
use App\Models\RegistryDate;
use Carbon\Carbon;

class CheckRegistration
{
    public function call($obj){
        $trace = [];
        try {
            if(!$this->checkRegistryDates($obj)){
                array_push($trace, "checkRegistry-error");
                return [
                    "result" => false,
                    "debug" => $trace
                ];
            }

            if(!$this->checkCns($obj)){
                array_push($trace, "checkCns-error");
                return [
                    "result" => false,
                    "debug" => $trace
                ];
            }

            if(!$this->checkBirthYear($obj)){
                array_push($trace, "checkcheckBirthYear-error");
                return [
                    "result" => false,
                    "debug" => $trace
                ];
            }

            if(!$this->checkTypeOfCertificate($obj)){
                array_push($trace, "checkTypeOfCertificate-error");
                return [
                    "result" => false,
                    "debug" => $trace
                ];
            }

            if(!$this->checkCivilRegistration($obj)){
                array_push($trace, "checkCivilRegistration-error");
                return [
                    "result" => false,
                    "debug" => $trace
                ];
            }

            return [
                "result" => true,
                "debug" => $trace
            ];
        } catch (\Exception $e) {
            return [
                "result" => false,
                "debug" => $trace
            ];
        }
    }


    public function checkRegistryDates($obj){
        if(!isset($obj['registry']->id)){
            return false;
        }
        $getDateRegistry = RegistryDate::where('registry_id', $obj['registry']->id)->get();
        $dou_certificate_date = explode('/', $obj['dou_certificate_date']);
        $dou_certificate_date =   $dou_certificate_date[2]."-".$dou_certificate_date[1]."-".$dou_certificate_date[0];

        $certificate_entry_date = explode('/', $obj['certificate_entry_date']);
        $certificate_entry_date =   $certificate_entry_date[2]."-".$certificate_entry_date[1]."-".$certificate_entry_date[0];

        $certificate_entry_date = Carbon::parse($certificate_entry_date);

        $dou_certificate_date = Carbon::parse($dou_certificate_date);


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
