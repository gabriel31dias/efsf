<?php

namespace App\Http\Livewire\Unity;

use App\Http\Repositories\UnityRepository;
use Livewire\Component;
use App\Models\Unity;
use App\Http\Repositories\ProfileRepository;
class UnityForm extends Component
{

    public $errorsKeys = [];
    public $errors = [];

    public $perfilName;
    public $daysToAccessInspiration;
    public $daysToActivityLock;
    public $obrigatory_filds = [
      "name"
    ];
    public $profile;
    public $action;
    public $fields = [
        "name" => "",
        "protocol_unit" => ""
    ];
    public function render()
    {
        return view('livewire.profiles.profile-form');
    }

    public function mount()
    {
        if($this->profile){
            $this->fields = [
                "name" => $this->profile->name,
                "protocol_unit" => $this->profile->protocol_unit
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

        $profile = Unity::updateOrCreate(['id' => $this->profile->id ?? 0],[
            'name' => $this->fields["name"],
            'protocol_unit' => $this->fields["protocol_unit"]
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
        $result = (new UnityRepository)->toggleStatus($this->profile->id);
        if($result){
            $this->profile->status = ! $this->profile->status;

            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Perfil desabilitado com sucesso."
            ]);
        }
    }
}
