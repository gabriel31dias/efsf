<?php

namespace App\Http\Livewire\Profiles;

use Livewire\Component;
use App\Models\Profile;
use App\Http\Repositories\ProfileRepository;
class ProfileForm extends Component
{

    public $errorsKeys = [];
    public $errors = [];

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
    public function render()
    {
        return view('livewire.profiles.profile-form');
    }

    public function mount()
    {
        if($this->profile){
            $this->fields = [
                "nome_perfil" => $this->profile->name_profile,
                "prazo_expiração" => $this->profile->days_to_access_inspiration,
                "prazo_expiração_inatividade" => $this->profile->days_to_activity_lock
            ];
        }
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

        $profile = Profile::updateOrCreate(['id' => $this->profile->id ?? 0],[
            'name_profile' => $this->fields["nome_perfil"],
            'status' => true,
            'days_to_access_inspiration' => $this->fields["prazo_expiração"],
            'days_to_activity_lock' => $this->fields["prazo_expiração_inatividade"]
        ]);

        if($profile){
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
