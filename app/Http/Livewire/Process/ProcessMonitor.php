<?php

namespace App\Http\Livewire\Process;

use App\Http\Services\GenerateNotifications;
use App\Models\Citizen;
use App\Models\Process;
use App\Models\ServiceStation;
use App\Models\User;
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
    public $user_name;

    public $status;

    public $service_station;
    public $service_station_name = "";

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
    public $listeners = ['selectedServiceStation', 'selectedUser'];
    public $profile;

    public $currentStatus;
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
        $this->dispatchs = Dispatch::where(['process_id' => $this->process->id])->get();
        $this->currentStatus = $this->process->situation;
        $user = auth()->user();

        if($this->process->situation == 1){
            $this->process->update(['situation' => Process::IN_REVIEW]);
            $newDespatch = Dispatch::create([
                'user_id' => $user->id,
                'type' => 2,
                'process_id' => $this->process->id,
                'comment' => $this->content,
                'statusString' => Process::SITUATION_TYPES_LABELS[Process::IN_REVIEW] 
            ]);
        }

        return view('livewire.process.process-monitor', []);
    }

    public function mount()
    {
        //$this->user = User::find($this->process->user_id);
        $this->service_station = ServiceStation::find($this->process->user_id); 


    }

    public function validation(){
        
        if($this->currentStatus == $this->status){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'error',
                'message'=> 'O novo status tem que ser diferente do anterior.'
            ]);

            return false;
        }

        return true;    
    }

    public function sendForwarding(){
        $sended = new GenerateNotifications();
        $user = auth()->user();

        $divergenceStatus = [3, 4, 5, 6, 7, 8];

        if (!$this->validation()) {
          return false;
        }

        $citizen = Citizen::where(['process' => $this->process->code ])->first();
       
        $res = $sended->call(['content' => $this->content, 
            'title' => $this->process->code .' Status alterado para '. (Process::SITUATION_TYPES_LABELS[$this->status] ?? '')  , 
            'resolution_url' => '/monitor/'.$this->process->id.'/edit', 
            'user_id_emiter'=> $user->id, 
            'user_receive' => $this->user->id ?? null, 
            'type' => 1, 
            'visualized' => false,
            'citizen_id' => $citizen->id,
            'service_station_id' => $this->service_station->id ?? $this->service_station
        ]);

        
        $newDespatch = Dispatch::create([
            'user_id' =>  $user->id,
            'type' => 2,
            'process_id' => $this->process->id,
            'comment' => $this->content,
            'statusString' => Process::SITUATION_TYPES_LABELS[$this->status],
            'to_user_id' => $this->user->id ?? null,
            'to_service_station_id' => $this->service_station->id ?? $this->service_station,
        ]);


        if(in_array((int) $this->status, $divergenceStatus)){        
             
            $process = Process::find($this->process->id);

            $process->update([
                'divergence' => true,
                'last_message' => $this->content,
                'situation' => $this->status,
                'to_user_id' => $this->user->id ?? null,
                'to_service_station_id' => $this->service_station->id ?? $this->service_station,
            ]);
        }else{
            $process = Process::find($this->process->id);

            $process->update([
                'divergence' => false,
                'last_message' => $this->content,
                'situation' => $this->status,
                'to_user_id' => $this->user->id ?? null,
                'to_service_station_id' => $this->service_station->id ?? $this->service_station,
            ]);
        }

        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> 'Atualização encaminhada'
        ]);

        $this->dispatchBrowserEvent('closeModal', []);

    }

    public function getDocumentByType($typeDocuments){
        return $this->typeDocuments[$typeDocuments];
    }

    public function selectedServiceStation($id)
    {
        $this->service_station = $id;
        $this->service_station_name = ServiceStation::find($id)->service_station_name;
        return true;
    }

    public function selectedUser($id){
        $this->user = $id;
        $this->user_name = User::find($id)->name;
        return true;
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
