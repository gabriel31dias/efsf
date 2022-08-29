<?php

namespace App\Http\Livewire\Profiles;

use Livewire\Component;
use App\Models\Profile;
class ProfileForm extends Component
{

    public $errorsKeys = [];
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
}
