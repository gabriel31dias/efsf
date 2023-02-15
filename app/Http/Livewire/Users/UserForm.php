<?php

namespace App\Http\Livewire\Users;
use App\Models\Profession;
use App\Models\Unit;
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
use App\Http\Repositories\ProfileRepository;
use App\Http\Repositories\TypeStreetRepository;
use App\Http\Repositories\ServiceStationsRepository;



class UserForm extends Component
{
    public $user;
    private $userRepository;
    public $perfil_namex;
    public $type_street;

    public $unit_id;

    public $user_id;

    public $unit;

    public $function;
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
        "profile_id" => "",
        "unit_id" => "",
        "profession_id" => "",

    ];

    public $obrigatory_filds = [
        "nome",
        "cpf",
        "celular",
        "email_confirm",
        "senha",
        "endereco",
        "login",
        "senha",
    ];

    public $errors = [];

    /**
     * listeners de eventos disparados por outros componentes
     */

    protected $listeners = ['selectedTypeStreat', 'selectedProfile',
    'selectedServiceStation', 'updatePassword', 'updateInfoIbge', 'selectedUnit', 'selectedProfession'];

    public function updateInfoIbge($request){
        $this->fields['endereco'] = $request['logradouro'];
        $this->fields['bairro'] = $request['bairro'];
        $this->fields['cidade'] = $request['cidade'];
        $this->fields['uf'] = $request['uf'];
    }

    public function updatePassword($request){
        $result = User::whereId($request['user_id'])->update([
            'password' => Hash::make($request['new_password'])
        ]);

        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> "Senha do Usuário foi atualizada com sucesso."
        ]);
    }

    public function selectedUnit($unit_id){
        $this->fields['unit_id'] = $unit_id;
        $this->unit_id = $unit_id;
        $this->emit('selectedUnit', $unit_id);
    }

    public function selectedProfession($profession_id){
        $this->fields['profession_id'] = $profession_id;
    }

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
        if($this->user){
            $this->getUser();
        }else{
            $this->fields['senha'] = "@SICweb123";
        }

    }

    public function getUser(){
        $this->userRepository = new UserRepository();
        $this->servicesPoints = new Collection();

        $profile = (new ProfileRepository())->findProfile($this->user->profile_id);
        $type_street = (new TypeStreetRepository())->findTypeStreet($this->user->type_street);

        $this->unit = Unit::find($this->user->unit_id);
        $this->function = Profession::find($this->user->profession_id);

        $this->type_street = $type_street->name_type_street ?? null;
        $this->perfil_namex = $profile->name_profile ?? null;
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
            "profile_id" => $this->user->profile_id,
            "status" => $this->user->status,
            "blocked" => $this->user->blocked,
            "unit_id" => $this->user->unit_id,
            "profession_id" => $this->user->profession_id,
        ];

        $this->servicesPoints = (new ServiceStationsRepository)->findServiceStations($this->user->id);
    }

    public function render()
    {

        $passwordIsValid = function ($password) {
            return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#=-])[0-9a-zA-Z$*&@#=-]{8,}$/', $password);
        };

        return view('livewire.users.usercreate', compact('passwordIsValid'));
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



        if (isset($this->fields['unit_id']) && $this->fields['unit_id'] == "") {
            array_push($errors, [
                "message" => "Unidade é obrigatoria",
                "valid" => false,
            ]);
        }

        if (isset($this->fields['profession_id']) && $this->fields['profession_id'] == "") {
            array_push($errors, [
                "message" => "Função é obrigatoria",
                "valid" => false,
            ]);
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

        $pass = $this->fields["senha"] ? $this->fields["senha"] : $this->user->password ;

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
            'services_points' => $this->servicesPoints,
            'activate_date_time' => now(),
            "unit_id" => $this->fields["unit_id"],
            "profession_id" => $this->fields["profession_id"],
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
            'user'=> $this->user_id
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



    public function enableDisableRegister(){
        $result = (new UserRepository())->toggleStatus($this->user->id);

        $this->user->status = ! $this->user->status;

        if($result){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Usuário desabilitado com sucesso."
            ]);
        }
    }

    public function blockUnblockRegister(){
        $result = (new UserRepository())->toggleBlocked($this->user->id);

        $this->user->blocked = ! $this->user->blocked;

        if($result){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Usuário bloqueado com sucesso."
            ]);
        }
    }

}
