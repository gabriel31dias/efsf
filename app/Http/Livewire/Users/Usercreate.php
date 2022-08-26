<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class Usercreate extends Component
{
    public $profiles = [];
    public $name;
    public $cpf;
    public $cep;
    public $endereco;
    public $number;
    public $complemento;
    public $complement;
    public $district;
    public $uf;
    public $celular;
    public $email;
    public $email_confirm;
    public $login;
    public $password;

    public function render()
    {
        return view('livewire.users.usercreate');
    }

    private function getServiceStations(){

    }

    public function addUser()
    {
        return redirect()->route('users.create');
    }

    public function createUser(){
        User::create([
            'cpf' => $this->cpf,
            'name' => $this->name,
            'zip_code' => $this->cep,
            'address' => $this->endereco,
            'type_street' => $this->endereco,
            'number' => $this->number,
            'complement' => $this->complement,
            'district' => $this->district,
            'uf' => $this->uf,
            'status' => true,
            'cell' => $this->celular,
            'email' => $this->email,
            'user_name' => $this->login,
            'password' => $this->password
        ]);
    }
}
