<?php

namespace App\Http\Livewire\Users;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use App\Models\User;
use App\Models\TypeStreet;
use App\Models\UserServiceStation;
use App\Models\Profile;
use App\Models\ServiceStation;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Http\Repositories\UserRepository;



class UserForm extends Component
{
    public $user;
    private $userRepository;
    public $perfil_namex;
    public $type_street;
    public $user_id;
    public $action ;
    public $profiles = [];
    public $errorsKeys = [];
    public $tempSelectedStation = null;
    public $servicesPoints = [];
    public $fields = [
        "nome" => "",
        "cpf" => "",
        "cep" => "",
        "endereco" => "",
        "numero" => "",
        "complemento" => "",
        "bairro" => "",
        "uf" => "",
        "celular" => "",
        "email" => "",
        "email_confirm" => "",
        "login" => "",
        "senha" => "",
        "cidade" => "",
        "type_street" => "",
        "profile_id" => ""
    ];

    public $obrigatory_filds = [
        "nome",
        "cpf",
        "celular",
        "email_confirm",
        "senha",
        "endereco",
        "login",
        "senha"
    ];

    public $errors = [];

    /**
     * listeners de eventos disparados por outros componentes
     */

    protected $listeners = ['selectedTypeStreat', 'selectedProfile', 'selectedServiceStation'];


    public function selectedTypeStreat($idTypeStreat)
    {
        $this->fields['type_street'] = $idTypeStreat;
    }

    public function selectedProfile($profileId)
    {
        $this->fields['profile_id'] = $profileId;
    }

    public function selectedServiceStation($id)
    {
        $this->tempSelectedStation = $id;
    }

    /**
     * ---------------------------------------------------------------------------------------
     */


    public function mount()
    {
        $this->userRepository = new UserRepository();
        $this->servicesPoints = new Collection();
        if($this->user){
            $profile = Profile::where('id', $this->user->profile_id)->first();
            $type_street = TypeStreet::where('id', $this->user->type_street)->first();

            $this->type_street = $type_street->name_type_street;
            $this->perfil_namex = $profile->name_profile;
            $this->user_id = $this->user->id;

            $this->fields = [
                "id" => $this->user->id,
                "nome" => $this->user->name,
                "cpf" => $this->user->cpf,
                "cep" => $this->user->zip_code,
                "endereco" => $this->user->address,
                "numero" => $this->user->number,
                "complemento" => $this->user->complement,
                "bairro" => $this->user->district,
                "uf" => $this->user->uf,
                "celular" => $this->user->cell,
                "email" => $this->user->email,
                "email_confirm" => $this->user->email,
                "login" => $this->user->user_name,
                "senha" => $this->user->password,
                "cidade" => $this->user->city,
                "type_street" => $this->user->type_street,
                "profile_id" => $this->user->profile_id
            ];
            $this->servicesPoints = ServiceStation::whereIn('id', UserServiceStation::where('user_id', $this->user->id)->get('service_station_id'))->get();
        }
    }

    public function render()
    {

        return view('livewire.users.usercreate');
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

        if($fields['email'] != $fields['email_confirm']){
            array_push($errors, [
                "message" => "O email digitado é divergente no campo de confirmação",
                "valid" => false,
            ]);
        }

        $user = User::where('email', '=', $fields['email'])->first();

        if (isset($user->id) && $this->action != "update") {
            array_push($errors, [
                "message" => "Este email já esta cadastrado por outro usuário",
                "valid" => false,
            ]);
        }
        return $errors;
    }

    public function checkMandatory($field){
        return in_array($field, $this->obrigatory_filds);
    }

    public function createUser(){
        $validation = $this->validation($this->fields);

        if(count($validation) > 0){
            $this->errors = $validation;

            $this->dispatchBrowserEvent('alert',[
                'type'=> 'error',
                'message'=> $validation[0]["message"]
            ]);
            return false;
        }

        $user = (new UserRepository())->createOrUpdateUser($this->user->id ?? 0, [
            'cpf' => $this->fields["cpf"],
            'name' => $this->fields["nome"],
            'zip_code' => $this->fields["cep"],
            'address' => $this->fields["endereco"],
            'type_street' => $this->fields["type_street"],
            'number' => $this->fields["numero"],
            'complement' => $this->fields["complemento"],
            'district' => $this->fields["bairro"],
            'uf' => $this->fields["uf"],
            'status' => true,
            'cell' => $this->fields["celular"],
            'email' => $this->fields["email"],
            'user_name' => $this->fields["login"],
            'password' => Hash::make($this->fields["senha"]),
            'city' => $this->fields["cidade"],
            'profile_id' => $this->fields["profile_id"],
            'services_points' => $this->servicesPoints
        ]);

        $this->messageSuccess();

        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/users',
            'delay' => 1000
        ]);
    }

    public function messageSuccess(){
        if($this->action == "create"){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Usuário criado com sucesso."
            ]);
            $this->emit('success_created', true);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Usuário foi atualizado com sucesso."
            ]);
            $this->emit('success_updated');
        }
    }

    public function openModalChangPassword(){
        $this->dispatchBrowserEvent('editPassword',[
            'usuario'=> $this->user_id
        ]);
    }

    public function addServicePoint(){

        if($this->checkExists($this->tempSelectedStation)){
            $this->closed = true;
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'warning',
                'message'=> "Esse posto de serviço já é vinculado a esse usuário."
            ]);
            return false;
        }
        if($this->tempSelectedStation == null){
            return false;
        }
        $servicePoint = ServiceStation::find($this->tempSelectedStation);
        $this->tempSelectedStation = null;
        $this->servicesPoints[] =  $servicePoint;
        $this->emit('clearServiceStationField');
    }

    public function checkExists($id){
        return false;
        if(!count($this->servicesPoints) > 0){
            return false;
        }
        $items =  $this->servicesPoints->filter(function ($value) use($id) {
            return $value->id == $id;
        });

        return count($items) > 0 ;
    }

}