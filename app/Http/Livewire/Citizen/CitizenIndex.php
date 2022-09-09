<?php

namespace App\Http\Livewire\Citizen;

use Livewire\Component;
use App\Models\Citizen;
class CitizenIndex extends Component
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

        $citizens = Citizen::orderBy('id','desc');;


        return view('livewire.citizen.citizen-index',
        [
            'citizens' =>  $citizens->paginate(15)
        ]);
    }

    public function filtersCall(){
        $searchTerm = null;

        if(!$searchTerm){
            $citizens = Citizen::orderBy('id','desc');
        }

        return $citizens;
    }

    public function openFilters(){
        $this->dispatchBrowserEvent('openFilters', []);
    }

    public function addCitizen()
    {
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/citizen/create',
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
