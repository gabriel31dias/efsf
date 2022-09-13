<?php

namespace App\Http\Livewire\Citizen;

use Livewire\Component;
use App\Http\Repositories\CitizenRepository;
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

    public $otherFiliations = [];
    public $filiationCount = 2;
    public $imigration = false;

    public $fields = [
        "name" => "",
        "cpf" => "",
        "rg" => "",
        "filiation1" => "",
        "filiation2" => "",
        "filiation3" => "",
        "other_filiations" => "",
        "birth_date" => "",
        "migration_situation" => "",
        "portaria_nr" => "",
        "data" => "",
        "secao_folha" => ""

    ];

    public $naturalized = false;

    public $listeners = ['selectedCountry', 'selectedCounty'];

    public function selectedCountry($value){
        if(strtoupper($value) != "BRASIL"){
            $this->imigration = true;
        }else{
            $this->imigration = false;
        }
    }

    public function selectedCounty($value){
        if(strtoupper($value) != "BRASIL"){
            $this->imigration = true;
        }else{
            $this->imigration = false;
        }
    }

    public function checkNaturalized($value){
        if($value == "2" || $value == "3"){
            $this->naturalized = true;
        }else{
            $this->naturalized = false;
        }
    }

    public function render()
    {

        $citizens = Citizen::orderBy('id','desc');;

        return view('livewire.citizen.citizen-index',
        [
            'citizens' =>  $citizens->paginate(15)
        ]);
    }

    public function addNewFiliationField(){
        $this->filiationCount++;
        $this->otherFiliations[] = "Filiation ".$this->filiationCount;
    }

    public function filtersCall(){
        $searchTerm = null;

        if(!$searchTerm){
            $citizens = Citizen::orderBy('id','desc');
        }

        return $citizens;
    }

    public function createCitizen(){
        $validation = $this->validation($this->fields);

        if(count($validation) > 0){
            $this->errors = $validation;

            $this->dispatchBrowserEvent('alert',[
                'type'=> 'error',
                'message'=> $validation[0]["message"]
            ]);
            return false;
        }

        $user = (new CitizenRepository())->createOrUpdateCitizen($this->user->id ?? 0, [
            'cpf' => $this->fields["cpf"] ?? null,
            'name' => $this->fields["name"] ?? null
        ]);

        $this->messageSuccess();

        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/users',
            'delay' => 1000
        ]);
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
