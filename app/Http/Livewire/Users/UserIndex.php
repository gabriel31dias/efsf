<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
class UserIndex extends Component
{

    public $searchTerm = null;
    public $searchName;
    public $searchCep;
    public $searchCelular;
    public $searchEndereco;
    public $searchCpf;
    public $searchDistrict;
    public $searchCity;

    public function render()
    {

        $searchTerm = null;

        if($this->searchName){
            $searchTerm = '%'. $this->searchName .'%';
            $users = User::where('name','ilike', '%'. $searchTerm .'%' )->paginate(15);
        }

        if($this->searchCelular){
            $searchTerm = '%'. $this->searchCelular .'%';
            $users = User::where('cell','ilike', '%'. $searchTerm .'%' )->paginate(15);
        }

        if($this->searchEndereco){
            $searchTerm = '%'. $this->searchEndereco .'%';
            $users = User::where('address','ilike', '%'. $searchTerm .'%' )->paginate(15);
        }

        if($this->searchCpf){
            $searchTerm = '%'. $this->searchCpf .'%';
            $users = User::where('cpf','ilike', '%'. $searchTerm .'%' )->paginate(15);
        }

        if($this->searchCep){
            $searchTerm = '%'. $this->searchCep .'%';
            $users = User::where('zip_code','ilike', '%'. $searchTerm .'%' )->paginate(15);
        }

        if($this->searchDistrict){
            $searchTerm = '%'. $this->searchDistrict .'%';
            $users = User::where('district','ilike', '%'. $searchTerm .'%' )->paginate(15);
        }

        if($this->searchCity){
            $searchTerm = '%'. $this->searchCity .'%';
            $users = User::where('city','ilike', '%'. $searchTerm .'%' )->paginate(15);
        }

        if(!$searchTerm){
            $users = User::orderBy('id','desc')->paginate(15);
        }

        return view('livewire.users.userindex',
        [
            'users' => $users
        ]);
    }

    public function openFilters(){
        $this->dispatchBrowserEvent('openFilters', []);
    }

    public function addUser()
    {
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/users/create',
        ]);
    }

    public function clickUpdate($id){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/users/'.$id.'/edit',
        ]);
    }
}
