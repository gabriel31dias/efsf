<?php

namespace App\Http\Livewire\Citizen;

use Livewire\Component;
use App\Http\Repositories\CitizenRepository;
use App\Models\Citizen;
use App\Models\Genre;
use App\Models\Country;


use App\Models\MaritalStatus;

class CitizenIndex extends Component
{
    public $searchTerm = null;
    public $searchName;
    public $filterUnlockeds;
    public $genre_name;
    public $filterActives;
    public $searchCitizen;
    public $action;
    public $filterInactives;
    public $filterBlockeds;
    public $searchCep;
    public $searchCelular;
    public $searchEndereco;
    public $searchCpf;
    public $searchDistrict;
    public $searchCity;
    public $other_genre;
    public $errorsKeys = [];
    public $errors = [];

    public $otherFiliations = [];
    public $filiationCount = 2;
    public $imigration = false;
    public $marital_status;

    public $obrigatory_filds = [
        "rg",
        "cpf",
        "name",
        "celular",
        "birth_date",
        "genre_id",
        "marital_status_id",
        "county_id",
        "uf_id",
        "county_id",
        "service_station_id",
        "via_rg"
    ];

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
        "dou_nr" => "",
        "data_dou" => "",
        "data" => "",
        "secao_folha" => "",
        "social_indicator_id" => "",
        "n_social" => "",
        "county_id" => "",

        "uf_id" => "",
        "service_station_id" => "",
        "via_rg" => "",
        "cid" => ""
    ];

    public $naturalized = false;

    public $listeners = ['selectedCountry', 'selectedCounty', 'selectedMaritalStatus',
        'selectedGenre', 'selectedUf', 'selectedCounty', 'selectedOccupation', 'selectedServiceStation'
    ];

    public function selectedServiceStation($id)
    {
        $this->fields['service_station_id'] = $id;
    }


    public function selectedOccupation($value){
        $this->fields['occupation_id'] = $value;
    }
    public function selectedCounty($value){
        $this->fields['county_id'] = $value;
    }

    public function selectedUf($value){
        $this->fields['uf_id'] = $value;
    }
    public function selectedMaritalStatus($value){
        $this->fields['marital_status_id'] = $value;
    }

    public function selectedGenre($value){
        $this->fields['genre_id'] = $value[0];

        if($value[1] == "outros" || $value[1] == "não binario"){
            $this->other_genre = true ;
        }else{
            $this->other_genre = false ;
        }
    }

    public function selectedCountry($value){
        if(strtoupper($value[0]) != "BRASIL"){
            $this->imigration = true;
        }else{
            $this->imigration = false;
        }
        $this->fields['country_id'] = $value[1];
    }

    public function checkNaturalized($value){
        if($value == "2" || $value == "3"){
            $this->naturalized = true;
        }else{
            $this->naturalized = false;
        }
    }

    public function chagedIndicatorSocial(){
        $this->dispatchBrowserEvent('changed_indicador_social', []);
    }

    public function setCitizen($id){
        $citizen = Citizen::find($id);

        $genre = Genre::find($citizen['genre_id']);
        $marital_status = MaritalStatus::find($citizen['marital_status_id']);
        $country = Country::find($citizen['country_id']);

        if (isset($citizen->id)) {
            $this->fields = [
                "name" => $citizen->name,
                "cpf" => $citizen->cpf,
                "rg" => $citizen->rg,
                "filiation1" => $citizen->filiation1,
                "filiation2" => $citizen->filiation2,
                "other_filiations" => "",
                "birth_date" => $citizen->birth_date,
                "migration_situation" => $citizen->migration_situation,
                "portaria_nr" => $citizen->portaria_nr,
                "dou_nr" => $citizen->dou_nr,
                "data_dou" => $citizen->data_dou,
                "data" => $citizen->data,
                "secao_folha" => $citizen->secao_folha,
                "social_indicator_id" => $citizen->social_indicator_id,
                "n_social" => $citizen->n_social,
                "county_id" => $citizen->county_id,
                "occupation_id" => $citizen->occupation_id,
                "genre_id" => $citizen->genre_id,
                "marital_status_id" => $citizen->marital_status_id,
                "uf_id" =>  $citizen->uf_id,
                "service_station_id" =>  $citizen->service_station_id,
                "via_rg" => $citizen->via_rg,
                "cid" => $citizen->cid,
                "country_id" =>  $citizen->country_id
            ];
        }
        $this->emit('setGenre', $genre->name ?? null);
        $this->emit('setMaritalStatus', $marital_status->name ?? null);
        $this->emit('setCountry',  $country->name ?? null);
    }

    public function render()
    {
        if($this->searchCitizen){
            $searchCitizen = '%'. $this->searchCitizen .'%';
            $citizens = Citizen::where('name','ilike', '%'. $searchCitizen .'%' )
            ->orWhere('rg','ilike', '%'. $searchCitizen .'%')
            ->orWhere('cpf','ilike', '%'. $searchCitizen .'%');
        }

        if (!$this->searchCitizen) {
            $citizens = Citizen::orderBy('id','desc');
        }

        return view('livewire.citizen.citizen-index',
        [
            'citizens' =>  $citizens->paginate(10)
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

    public function checkMandatory($field){
        return in_array($field, $this->obrigatory_filds);
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

        if(trim($this->fields['filiation1']) == "" || $this->fields['filiation2'] == "" ){
            array_push($errors, [
                "message" => "O Cidadão deve ter pelo menos um dos campos de filiação preenchido",
                "valid" => false,
            ]);
            $this->errorsKeys[] = $field;
        }

        if(trim($this->action != "update")){
            $check = Citizen::where('rg', $this->fields['rg'] )->first();
            if(isset($check->id)){
                array_push($errors, [
                    "message" => "O RG deverá ser único para cada cidadão",
                    "valid" => false,
                ]);
                $this->errorsKeys[] = $field;
            }
        }

        return $errors;
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
            "name" => $this->fields["name"],
            "cpf" => $this->fields["cpf"],
            "rg" => $this->fields["rg"],
            "filiation1" => $this->fields["filiation1"],
            "filiation2" => $this->fields["filiation2"],
            "filiation3" => $this->fields["filiation2"],
            "birth_date" => $this->fields["birth_date"],
            "migration_situation" => $this->fields["migration_situation"],
            "portaria_nr" => $this->fields["portaria_nr"],
            "dou_nr" => $this->fields["dou_nr"],
            "data_dou" => $this->fields["data_dou"],
            "data" => $this->fields["data"],
            "secao_folha" => $this->fields["secao_folha"],
            "social_indicator_id" => $this->fields["social_indicator_id"],
            "n_social" =>  $this->fields["n_social"],
            "county_id" => $this->fields["county_id"],
            "genre_id" => $this->fields["genre_id"],
            "occupation_id" => $this->fields["occupation_id"],
            "cid" =>  $this->fields["cid"],
            "via_rg" =>  $this->fields["via_rg"],
            "marital_status_id" => $this->fields["marital_status_id"],
            "country_id" => $this->fields["country_id"]
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
                'message'=> "Perfil criado com sucesso."
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Perfil foi atualizado com sucesso."
            ]);
        }
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
