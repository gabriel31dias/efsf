<?php

namespace App\Http\Livewire\Process;

use App\Http\Services\GenerateNotifications;
use App\Models\Process;
use Livewire\Component;
use App\Models\Profile;
use App\Models\Notification;
use App\Http\Repositories\ProfileRepository;
use App\Models\Permission;
use App\Models\Dispatch;


class ProcessMonitor extends Component
{

    public $errorsKeys = [];
    public $errors = [];

    public $content = "";

    public $user;

    public $service_station;

    public $documents = [];
    public $permissions = [];
    public $profile_permissions = [];

    public $dispatchs = [];

    public $perfilName;
    public $daysToAccessInspiration;
    public $daysToActivityLock;
    public $obrigatory_filds = [
      "nome_perfil",
      "prazo_expiração",
      "prazo_expiração_inatividade"
    ];
    public $profile;
    public $action;
    public $fields = [
        "nome_perfil" => "",
        "prazo_expiração" => "",
        "prazo_expiração_inatividade" => ""
    ];

    public $typeDocuments = [
        "1" => "CPF",
        "2" => "PIS",
        "3" => "PASEP",
        "4" => "COMPROVANTE DE ENDEREÇO",
        "5" => "Laudo Médico",
        "6" => "TITULO ELEITOR",
        "7" => "IDENTIFICAÇÃO PROFISSIONAL",
        "8" => "CARTEIRA DE TRABALHO E PREVIDENCIA SOCIAL – CTPS",
        "9" => "CARTEIRA NACIONAL DE HABILITAÇÃO – CNH",
        "10" => "CERTIFICADO MILITAR",
        "11" => "EXAME TIPO SANGUINEO/FATOR RH",
        "12" => "COMPROVANTE DE VULNERABILIDADE OU A CONDIÇÃO PARTICULAR DE SAÚDE",
        "13" => "CARTÃO DE BENEFICIO SOCIAL",
        "14" => "ENCAMINHAMENTO SOCIAL",
        "15" => "BOLETIM DE OCORRENCIA",
        "16" => "DECLARAÇÃO DE NOME SOCIAL",
        "17" => "CERTIDÃO DE CASAMENTO",
        "18" => "CERTIDÃO DE CASAMENTO/DIVORCIADO",
        "19" => "CERTIDÃO DE NASCIMENTO",
        "20" => "Certidão de casamento/COM AVERBAÇÃO DE SEPARAÇÃO",
        "21" => "Certidão de casamento/CASAMENTO COM AVERBAÇÃO DE ÓBITO",
        "22" => "CERTIDÃO DE NASCIMENTO/CASAMENTO ESTRANGEIRA",
        "23" => "PRONTUÁRIO CIVIL",
        "24" => "INDIVIDUAL DATILOSCÓPICA",
        "25" => "CERTIDÃO DE CASAMENTO",
        "26" => "CERTIDÃO DE NASCIMENTO",
        "27" => "DIÁRIO OFICIAL DA UNIÃO-DOU",
        "28" => "CERTIDÃO DE OPÇÃO DE NACIONALIDADE",
        "29" => "CARTEIRA DE IDENTIDADE DE ESTRAGEIRO",
        "30" => "CARTEIRA DE AUTISTA"
    ];
    public $process;
    public function render()
    {
        $this->dispatchs = Dispatch::where(['id' => $this->process->id])->get();


        if($this->process->situation == 1){
            $this->process->update(['situation' => 2]);
        }

        return view('livewire.process.process-monitor', []);
    }

    public function mount()
    {

    }

    public function sendForwarding(){
        $sended = new GenerateNotifications();
        $res = $sended->call(['content' => $this->content, 
        'title' =>  'teste', 
        'resolution_url' => '/', 
        'user_id_emiter'=> 1 , 
        'user_receive' => 1, 
        'visualized' => true]);
    }

    public function getDocumentByType($typeDocuments){
        return $this->typeDocuments[$typeDocuments];
    }

    public function saveProfile(){
        $validation = $this->validation($this->fields);

        if(count($validation) > 0){
            $this->errors = $validation;

            $this->dispatchBrowserEvent('alert',[
                'type'=> 'error',
                'message'=> $validation[0]["message"]
            ]);
            return false;
        }

        $process = Profile::updateOrCreate(['id' => $this->profile->id ?? 0],[
            'name_profile' => $this->fields["nome_perfil"],
            'status' => true,
            'days_to_access_inspiration' => $this->fields["prazo_expiração"],
            'days_to_activity_lock' => $this->fields["prazo_expiração_inatividade"]
        ]);



        if($process){
            $this->messageSuccess();
            $this->dispatchBrowserEvent('redirect',[
                'url'=> '/profile',
                'delay' => 1000
            ]);
        }
    }

    public function messageSuccess(){
        if($this->action == "create"){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Perfil criado com sucesso."
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Perfil foi atualizado com sucesso."
            ]);
        }
    }

    private function validation($fields){
        $errors = [];
        $this->errorsKeys = [];
        $this->errors = [];
        foreach ($fields as $field => $value)
        {
            if($this->checkMandatory($field) && empty(trim($value))){
                array_push($errors, [
                    "message" => "O campo {$field} é obrigatorio",
                    "valid" => false,
                ]);
                $this->errorsKeys[] = $field;
            }
        }

        return $errors;
    }

    public function checkMandatory($field){
        return in_array($field, $this->obrigatory_filds);
    }

    public function enableDisableRegister(){
        $result = (new ProfileRepository)->toggleStatus($this->profile->id);
        if($result){
            $this->profile->status = ! $this->profile->status;

            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Perfil desabilitado com sucesso."
            ]);
        }
    }
}
