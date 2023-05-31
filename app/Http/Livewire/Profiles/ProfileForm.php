<?php

namespace App\Http\Livewire\Profiles;

use Livewire\Component;
use App\Models\Profile;
use App\Http\Repositories\ProfileRepository;
use App\Models\Permission;

class ProfileForm extends Component
{

    public $errorsKeys = [];
    public $errors = [];
    public $permissions = [];
    public $profile_permissions = [];
    public $selectAllValue = [];

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
        $this->permissions = Permission::orderBy('id', 'asc')->get()->groupBy('group')->toArray();
        if($this->profile){
            $this->profile_permissions = $this->profile->permissions->pluck('id')->toArray();
            $this->fields = [
                "nome_perfil" => $this->profile->name_profile,
                "prazo_expiração" => $this->profile->days_to_access_inspiration,
                "prazo_expiração_inatividade" => $this->profile->days_to_activity_lock
            ];
        }
        foreach ($this->permissions as $key => $p) {
            $ids = array_column($p, 'id');
            $checked = empty(array_diff($ids, $this->profile_permissions));
            $this->selectAllValue[$key] = $checked;
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

        $profile->permissions()->sync($this->profile_permissions);

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

    public function selectAllGroup($group, $checked){ 
        if($checked){ 
            foreach ($this->permissions[$group] as $key => $permission) {
                if (!in_array($permission['id'], $this->profile_permissions)) {
                    array_push($this->profile_permissions, $permission['id']);
                }
            }
        }else { 
            foreach ($this->permissions[$group] as $key => $permission) {
                $index = array_search($permission['id'], $this->profile_permissions);
                if ($index !== false) {
                    array_splice($this->profile_permissions, $index, 1); // Remove o valor do array
                }
            }
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
