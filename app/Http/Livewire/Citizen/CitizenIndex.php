<?php

namespace App\Http\Livewire\Citizen;

use App\Models\CountryTypeStreat;
use App\Models\TypeStreet;
use Livewire\Component;
use App\Http\Repositories\CitizenRepository;
use App\Models\Citizen;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Uf;
use App\Models\County;
use App\Models\Occupation;
use App\Models\MaritalStatus;
use App\Models\ServiceStation;

class CitizenIndex extends Component
{
    public $searchTerm = null;
    public $genre_name;
    public $searchCitizen;
    public $action;
    public $filterInactives;
    public $filterBlockeds;
    public $searchCep;
    public $searchCelular;
    public $searchEndereco;
    public $citizensItems;
    public $searchDistrict;
    public $searchCity;
    public $other_genre;
    public $errorsKeys = [];
    public $errors = [];
    public $searchGenrer;
    public $genres;
    public $searchCpf;
    public $searchRg;
    public $searchAnoProcesso;
    public $searchNumber;
    public $searchNrCedula;
    public $searchName;
    public $searchBirth;
    public $searchFilitation;
    public $otherFiliations = [];
    public $otherFiliationsValues = [];
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
        "via_rg",
        "cell",
        "telephone",
        "email",
        "zip_code",
        "zone"
    ];

    public $tranlaction_filds = [
        "rg" => "rg",
        "cpf" => "cpf",
        "name" => "nome",
        "celular" => "celular",
        "birth_date" => "data de nascimento",
        "genre_id" => "gênero",
        "marital_status_id" => "estado civil",
        "county_id" => "município",
        "uf_id"  => "uf",
        "service_station_id" => "posto de serviço",
        "via_rg" => "via rg",
        "address" => "endereço",
        "number" => "numero",
        "complement" => "complemento",
        "provenance" => "proveniência",
        "reference_point" => "ponto de referência",
        "cell" => "celular",
        "telephone" => "telefone",
        "email" => "email",
        "zip_code" => "cep"
    ];


    public $selectedTab;

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
        "cid" => "",
        "zip_code" => "",
        "address" => "",
        "number" => "",
        "complement" => "",
        "provenance" => "",
        "reference_point" => "",
        "cell" => "",
        "telephone" => "",
        "email" => "",
        "certificate" => "",
        "book_number" => "",
        "term_number" => "",
        "book_letter" => "",
        "forwarded_with_process" => "",
        "sheet_number" => "",
        "certificate_entry_date" => "",
        "same_sex_marriage" => "",
        "type_of_certificate" => "",
        "dou_certificate_date" => "",
        "uf_certificate" => "",
        "county_certificate" => "",
        "previous_registration_certificate" => "",
        "matriculation"=> "",
        "name_place" => "",
        "marital_status_id" => "",
        "genre_id" => ""
    ];

    public $curretTypeStreet;
    public $currentCountry;
    public $idCitizen;
    public $zone;

    public $registrySuspension;

    public $naturalized = false;

    public $listeners = ['selectedCountry', 'selectedCounty', 'selectedMaritalStatus',
        'selectedGenre', 'selectedUf', 'selectedCounty', 'selectedOccupation', 'selectedServiceStation',
        'selectedCountryTypeStreat', 'selectedTypeStreat', 'setCitizen', 'selectedUfCert', 'selectedCountyCert'
    ];

    public $citizen;
    public $currentGenre;
    public $currentMatiral;
    public $currentUf;
    public $currentUfCert;
    public $currentCounty;
    public $currentCountyCert;

    public $currentOccupation;
    public $currentServiceStation;
    public $currentTypeStreet;

    public function selectedUfCert($id){
        $this->fields['type_street_id'] = $id;
        $this->currentUfCert = Uf::find($id)->name_type_street;
    }

    public function selectedCountyCert($id){
        $this->fields['county_certificate'] = $id;
        $this->currentCountyCert = County::find($id)->name_type_street;
    }

    public function selectedTypeStreat($id)
    {
        $RURAL_ZONE = 1;
        $this->fields['type_street_id'] = $id;
        $this->curretTypeStreet = TypeStreet::find($id)->name_type_street;
    }

    public function changZone(){
        $RURAL_ZONE = 1;
        if($this->zone == $RURAL_ZONE){


        }else{

        }
    }

    public function  selectedCountryTypeStreat($id)
    {
        $this->fields['country_type_street_id'] = $id;
        $this->curretTypeStreet = CountryTypeStreat::find($id)->name_type_street;
    }

    public function selectedServiceStation($id)
    {
        $this->fields['service_station_id'] = $id;
        $this->currentServiceStation = ServiceStation::find($id)->service_station_name;
    }

    public function updated(){


    }

    public function selectedOccupation($value){
        $this->fields['occupation_id'] = $value;
        $this->currentOccupation = Occupation::find($value)->name;
    }
    public function selectedCounty($value){
        $this->fields['county_id'] = $value;
        $this->currentCounty = Country::find($value)->name;
    }

    public function selectedUf($value){
        $this->fields['uf_id'] = $value;
        $this->currentUf = Uf::find($value)->acronym;
    }
    public function selectedMaritalStatus($value){
        $this->fields['marital_status_id'] = $value;
        $this->currentMatiral = MaritalStatus::find($value)->name;
    }

    public function selectedGenre($value){
        $this->fields['genre_id'] = $value[0];

        if($value[1] == "outros" || $value[1] == "não binario"){
            $this->other_genre = true ;
        }else{
            $this->other_genre = false ;
        }

        $this->currentGenre = Genre::find($value[0])->name;
    }

    public function setSelectedTab($tab){
        $this->selectedTab = $tab;
        $this->dispatchBrowserEvent('selectedTab',[
            'tab'=> $tab
        ]);

        $this->dispatchBrowserEvent('reload-masks');

    }

    public function selectedCountry($value){
        if(strtoupper($value[0]) != "BRASIL"){
            $this->imigration = true;
        }else{
            $this->imigration = false;
        }
        $this->fields['country_id'] = $value[1];
        $this->currentCountry= $value[0];
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

    public function goSearch(){
        $this->dispatchBrowserEvent('closeModalSearch', []);
    }

    public function editCitizen($id){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/citizen/'.$id.'/edit',
        ]);
    }

    public function setCitizen($id){
        if(!$id){
            return false;
        }

        $citizen = Citizen::find($id);
        $this->citizen = $citizen;
        $this->action = "update";

        $genre = Genre::find($citizen['genre_id']);
        $marital_status = MaritalStatus::find($citizen['marital_status_id']);
        $country = Country::find($citizen['country_id']);
        $uf = Uf::find($citizen['uf_id']);
        $county = County::find($citizen['county_id']);
        $ocupation = Occupation::find($citizen['occupation_id']);
        $service_station = ServiceStation::find($citizen['service_station_id']);


        //dd($citizen );
        $this->currentUfCert = Uf::find($citizen['uf_certificate']);

        $this->zone = $citizen->zone;



        if(isset($citizen['country_type_street_id'])){
            $type_street = CountryTypeStreat::find($citizen['country_type_street_id']);
        }

        if(isset($citizen['type_street_id'])){
            $type_street = TypeStreet::find($citizen['type_street_id']);
        }


        if (isset($citizen->id)) {
            $this->fields = [
                "name" => $citizen->name,
                "id" => $citizen->id,
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
                "country_id" =>  $citizen->country_id,
                "zip_code" => $citizen->zip_code,
                "address" => $citizen->address,
                "number" => $citizen->number,
                "complement" => $citizen->complement,
                "provenance" => $citizen->provenance,
                "reference_point" => $citizen->reference_point,
                "cell" => $citizen->cell,
                "fields" => $citizen->zone,
                "telephone" => $citizen->telephone,
                "email" => $citizen->email,
                "certificate" => $citizen->certificate,
                "type_of_certificate" => $citizen->type_of_certificate,
                "previous_registration_certificate" => $citizen->previous_registration_certificate,
                "matriculation" => $citizen->matriculation,
                "name_place" => $citizen->name_place,
                "certificate_entry_date" => $citizen->certificate_entry_date,
                "same_sex_marriage" => $citizen->certificate_entry_date,


            ];
        }

        $this->curretTypeStreet = $type_street->name_type_street ?? null;
        $this->currentCountry = $country->name ?? null;
        $this->currentGenre = $genre->name ?? null;
        $this->currentMatiral = $marital_status->name ?? null;
        $this->currentUf = $uf->acronym ?? null ;
        $this->currentCounty = $county->name ?? null;
        $this->currentOccupation = $ocupation->name;
        $this->currentServiceStation = $service_station->service_station_name ?? null;
        $this->currentTypeStreet = $type_street->name_type_street ?? null;
        $this->zone = $citizen->zone ?? null;

        $this->dispatchBrowserEvent('closeModalList');
        $this->dispatchBrowserEvent('closeModalSearch');
    }

    public function mount(){
        if(isset($this->citizen->id)){
            $this->setCitizen($this->citizen->id);
        }else{
            $this->dispatchBrowserEvent("openModalSearch");
        }
    }
    public function render()
    {
        $this->genres = Genre::all();



        $citizens = new Citizen();
        if($this->searchName){
            $citizens = $citizens->where('name','ilike', '%'. $this->searchName .'%' );
        }

        if($this->searchRg){
            $citizens = $citizens->where('rg','ilike', '%'. $this->searchRg .'%' );
        }

        if($this->searchCpf){
            $citizens = $citizens->where('cpf','ilike', '%'. $this->searchCpf .'%' );
        }

        if($this->searchCpf){
            $citizens = $citizens->where('cpf','ilike', '%'. $this->searchCpf .'%' );
        }

        if($this->searchGenrer){
            $genrer = Genre::where('id', $this->searchGenrer)->first();
            if(isset($genrer->id)){
                $citizens = $citizens->where('genre_id', $genrer->id);
            }
        }

        if($this->searchNumber){
           //$citizens = $citizens::where('cpf','ilike', '%'. $this->searchNumber .'%' );
        }

        return view('livewire.citizen.citizen-index',
        [
            'citizens' =>  $citizens->get()
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

    public function getTranslaction($field){
       return $this->tranlaction_filds[$field] ?? "";
    }

    private function validation($fields){
        $errors = [];
        $ZONE_RURAL = 1;
        $ZONE_URBANA = 2;
        $this->errorsKeys = [];
        $this->errors = [];
        foreach ($fields as $field => $value)
        {
            if($this->checkMandatory($field) && empty(trim($value))){
                $field_item = $this->getTranslaction($field);
                array_push($errors, [
                    "message" => "O campo {$field_item} é obrigatorio",
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


        if($this->zone == $ZONE_URBANA){
            $fileds_validation = ["provenance", "number", "address", "complement"];

            foreach ($fileds_validation as $value) {
                if(empty($this->fields[$value])){

                    $value = $this->getTranslaction($value);
                    array_push($errors, [
                        "message" => "O campo {$value} é obrigatorio",
                        "valid" => false,
                    ]);
                }

            }

            $this->errorsKeys[] = $value;
        }



        if($this->zone == $ZONE_RURAL){
            $fileds_validation = ["name", "reference_point"];

            foreach ($fileds_validation as $value) {
                if(empty($this->fields[$value])){

                    $value = $this->getTranslaction($value);

                    array_push($errors, [
                        "message" => "O campo {$value} é obrigatorio",
                        "valid" => false,
                    ]);
                }

            }

            $this->errorsKeys[] = $value;
        }

        return $errors;
    }

    public function createCitizen(){
        $this->fields["zone"] = $this->zone;
        $validation = $this->validation($this->fields);

        if(count($validation) > 0){
            $this->errors = $validation;

            $this->dispatchBrowserEvent('alert',[
                'type'=> 'error',
                'message'=> $validation[0]["message"]
            ]);
            return false;
        }

        $time = strtotime('10/16/2003');

        $newformat = date('Y-m-d',$time);

        $user = (new CitizenRepository())->createOrUpdateCitizen($this->citizen->id ?? 0, [
            "name" => $this->fields["name"],
            "cpf" => $this->fields["cpf"],
            "rg" => $this->fields["rg"],
            "filiation1" => $this->fields["filiation1"],
            "filiation2" => $this->fields["filiation2"],
            "filiation3" => $this->fields["filiation2"],
            "birth_date" => $this->fields["birth_date"],
            "other_filiations" => \json_encode($this->otherFiliationsValues),
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

            "country_id" => $this->fields["country_id"],
            "service_station_id" => $this->fields["service_station_id"],
            "uf_id" => $this->fields["uf_id"],
            "zip_code" => $this->fields["zip_code"],
            "address" => $this->fields["address"],
            "number" => $this->fields["number"],
            "complement" => $this->fields["complement"],
            "provenance" =>  $this->fields["provenance"],
            "reference_point" => $this->fields["reference_point"],
            "cell" => $this->fields["cell"],
            "telephone" => $this->fields["telephone"],
            "email" => $this->fields["email"],
            "country_type_street_id" => $this->fields["country_type_street_id"] ?? null,
            "type_street_id" => $this->fields["type_street_id"] ?? null,
            "zone" => $this->fields["zone"] ?? null,

            "certificate" => $this->fields["certificate"] ?? null,
            "type_of_certificate" => $this->fields["type_of_certificate"] ?? null,
            "book_number" => $this->fields["book_number"] ?? null,
            "term_number" => $this->fields["term_number"] ?? null,
            "book_letter" => $this->fields["book_letter"] ?? null,
            "forwarded_with_process" => $this->fields["forwarded_with_process"] ?? null,
            "sheet_number" => $this->fields["sheet_number"] ?? null,
            "certificate_entry_date" => $this->fields["certificate_entry_date"] ?? null,
            "same_sex_marriage" => $this->fields["same_sex_marriage"] ?? null,
            "dou_certificate_date" => $this->fields["dou_certificate_date"] ?? null,
            "uf_certificate" => $this->fields["uf_certificate"] ?? null,
            "county_certificate" => $this->fields["county_certificate"] ?? null,
            "previous_registration_certificate" => $this->fields["previous_registration_certificate"] ?? null,
            "matriculation" => $this->fields["matriculation"] ?? null,
            "name_place" => $this->fields["name_place"] ?? null,




         ]);

        $this->messageSuccess();

        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/citizen',
            'delay' => 1000
        ]);
    }

    public function messageSuccess(){
        if($this->action == "create"){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Cidadão criado com sucesso."
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Cidadão foi atualizado com sucesso."
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


}
