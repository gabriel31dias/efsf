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

        $returnVarDou_certificate_date = false;
        $returnVarCertificate_entry_date = false;

        $returnVarDou_certificate_date_incorporation = false;
        $returnVarCertificate_entry_date_incorporation = false;

        $getDateRegistry = RegistryDate::where('registry_id', $obj['registry']->id)->get();

        $dou_certificate_date = explode('/', $obj['dou_certificate_date']);
        $dou_certificate_date = $dou_certificate_date[2]."-".$dou_certificate_date[1]."-".$dou_certificate_date[0];

        $certificate_entry_date = explode('/', $obj['certificate_entry_date']);
        $certificate_entry_date = $certificate_entry_date[2]."-".$certificate_entry_date[1]."-".$certificate_entry_date[0];

        $certificate_entry_date = Carbon::parse($certificate_entry_date);

        $dou_certificate_date = Carbon::parse($dou_certificate_date);


        foreach ($getDateRegistry as $item) {
            // checa Data da Certidão/DOU* com a Data da Criação do cartorio
            if($item->closing_date && $returnVarDou_certificate_date == false){
                if($item->created_date <= $dou_certificate_date && $item->closing_date >= $dou_certificate_date){
                    $returnVarDou_certificate_date = true;
                }
            }else{

                if($returnVarDou_certificate_date == false && $item->created_date <= $dou_certificate_date){
                    $returnVarDou_certificate_date = true;
                }
            }

            // checa Data de Encerramento do cartorio
            if($item->closing_date && $returnVarCertificate_entry_date == false){
                if($item->created_date <= $certificate_entry_date && $item->closing_date >= $certificate_entry_date){
                    $returnVarCertificate_entry_date = true;
                }
            }else{
                if($returnVarCertificate_entry_date == false && $item->created_date <= $certificate_entry_date){
                    $returnVarCertificate_entry_date = true;
                }
            }


            // checa a Data da Certidão/DOU* com a Data de incorporação do cartorio, não pode ter dentro desse periodo
            if($item->unincorporated_date || $item->unincorporated_date){

                if($item->unincorporated_date && $returnVarDou_certificate_date_incorporation == false){
                    if($item->incorporated_date <= $dou_certificate_date && $item->unincorporated_date >= $dou_certificate_date){
                        $returnVarDou_certificate_date_incorporation = true;
                    }
                }else{
                    if($returnVarDou_certificate_date == false && $item->incorporated_date <= $dou_certificate_date){
                        $returnVarDou_certificate_date_incorporation = true;
                    }
                }

                dd($returnVarDou_certificate_date_incorporation);

                // checa a Data de Encerramento com a Data de incorporação do cartorio, não pode ter dentro desse periodo
                if($item->unincorporated_date && $returnVarCertificate_entry_date_incorporation == false){

                    if($item->incorporated_date <= $certificate_entry_date && $item->unincorporated_date >= $certificate_entry_date){
                        $returnVarCertificate_entry_date_incorporation = true;
                    }
                }else{
                    if($returnVarCertificate_entry_date_incorporation == false && $item->incorporated_date <= $certificate_entry_date){
                        $returnVarCertificate_entry_date_incorporation = true;
                    }
                }
            }

        }

        return $returnVarDou_certificate_date == true && $returnVarCertificate_entry_date == true &&
         $returnVarCertificate_entry_date_incorporation == false && $returnVarDou_certificate_date_incorporation == false ? true : false;
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
