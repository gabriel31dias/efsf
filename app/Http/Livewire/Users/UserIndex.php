<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
class UserIndex extends Component
{
    public $searchTerm = null;
    public $searchName;
    public $filterUnlockeds;
    public $filterActives;
    public $filterInactives;
    public $filterBlockeds;
    public $searchCep;
    public $searchCelular;
    public $searchEndereco;
    public $searchCpf;
    public $searchDistrict;
    public $searchCity;

    public function render()
    {

        $users = $this->filtersCall();

        if($this->filterUnlockeds || $this->filterBlockeds || $this->filterActives || $this->filterInactives){
            $status = [];
            $users->where(function($query) use($status){
                if($this->filterUnlockeds){
                    $query->orWhere(['blocked' => false]);
                }

                if($this->filterBlockeds){
                    $query->orWhere(['blocked' => true]);
                }

                if($this->filterActives){
                    $query->orWhere(['status' => true]);
                }

                if($this->filterInactives){
                    $query->orWhere(['status' => false]);
                }
            });
        }

        return view('livewire.users.userindex',
        [
            'users' => $users->paginate(15)
        ]);
    }

    public function filtersCall(){
        $searchTerm = null;

        if($this->searchName){
            $searchTerm = '%'. $this->searchName .'%';
            $users = User::where('name','ilike', '%'. $searchTerm .'%' );
        }

        if($this->searchCelular){
            $searchTerm = '%'. $this->searchCelular .'%';
            $users = User::where('cell','ilike', '%'. $searchTerm .'%' );
        }

        if($this->searchEndereco){
            $searchTerm = '%'. $this->searchEndereco .'%';
            $users = User::where('address','ilike', '%'. $searchTerm .'%' );
        }

        if($this->searchCpf){
            $searchTerm = '%'. $this->searchCpf .'%';
            $users = User::where('cpf','ilike', '%'. $searchTerm .'%' );
        }

        if($this->searchCep){
            $searchTerm = '%'. $this->searchCep .'%';
            $users = User::where('zip_code','ilike', '%'. $searchTerm .'%' );
        }

        if($this->searchDistrict){
            $searchTerm = '%'. $this->searchDistrict .'%';
            $users = User::where('district','ilike', '%'. $searchTerm .'%' );
        }

        if($this->searchCity){
            $searchTerm = '%'. $this->searchCity .'%';
            $users = User::where('city','ilike', '%'. $searchTerm .'%' );
        }


        if(!$searchTerm){
            $users = User::orderBy('id','desc');
        }

        return $users;
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

    public function mount(){
        $this->filterActives = true;
    }
}
