<?php

namespace App\Http\Livewire\Citizen;
use App\Http\Services\GenerateProcess;
use App\Models\Dispatch;
use App\Models\Process;
use Illuminate\Support\Facades\Storage;
use App\Http\Services\CheckRegistration;
use App\Models\CountryTypeStreat;
use App\Models\Registry;
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
use Livewire\WithFileUploads;
use PHPUnit\Framework\Constraint\Count;
use App\Models\BlockedCertificate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



class CitizenIndex extends Component
{

    use WithFileUploads;
    public $searchTerm = null;
    public $ufs;


    public $file_capture_image_string;
    public $genre_name;
    public $traceErrorsMatriculation;
    public $file;
    public $searchCitizen;
    public $action;
    public $filterInactives;
    public $filterBlockeds;
    public $searchCep;
    public $searchCelular;
    public $searchEndereco;
    public $citizensItems;
    public $searchDistrict;
    public $signFile;
    public $justificationSign;
    public $fileSign;
    public $searchCity;
    public $jaUtilizados = [];
    public $other_genre;
    public $errorsKeys = [];
    public $errors = [];
    public $searchGenrer;
    public $genres;
    public $searchCpf;
    public $searchRg;
    public $is_payment_free;

    public $file_capture_image_preview;
    public $file_capture_image;

    public $currentRegistryId = "";

    public $tempFile = "";
    public $tempTypeFile = "";
    public $searchAnoProcesso;
    public $searchNumber;
    public $searchNrCedula;
    public $searchName;

    public $process;

    public $currentUfIdent;

    public $registrationError = true;
    public $searchBirth;
    public $searchFilitation;
    public $otherFiliations = [];
    public $professionalIdentitys = [];
    public $professionalIdentitysCount = 1;
    public $professionalIdentitysValues = [];
    public $otherFiliationsValues = [];
    public $filiationCount = 2;
    public $imigration = false;
    public $marital_status;

    public $registrySelected;

    public $listDOCS = [
       "CPF",
       "PIS",
       "PASEP",
       "COMPROVANTE DE ENDEREÇO",
       "Laudo Médico",
       "TITULO ELEITOR",
       "IDENTIFICAÇÃO PROFISSIONAL",
       "CARTEIRA DE TRABALHO E PREVIDENCIA SOCIAL – CTPS",
       "CARTEIRA NACIONAL DE HABILITAÇÃO – CNH",
       "CERTIFICADO MILITAR",
       "EXAME TIPO SANGUINEO/FATOR RH",
       "COMPROVANTE DE VULNERABILIDADE OU A CONDIÇÃO PARTICULAR DE SAÚDE",
       "CARTÃO DE BENEFICIO SOCIAL",
       "ENCAMINHAMENTO SOCIAL",
       "BOLETIM DE OCORRENCIA",
       "PRONTUÁRIO CIVIL",
       "INDIVIDUAL DATILOSCÓPICA",
       "CERTIDÃO DE CASAMENTO",
       "CERTIDÃO DE NASCIMENTO",
       "DIÁRIO OFICIAL DA UNIÃO-DOU",
       "CERTIDÃO DE OPÇÃO DE NACIONALIDADE",
       "CARTEIRA DE IDENTIDADE DE ESTRAGEIRO",
       "CARTEIRA DE AUTISTA",
    ];

    public $obrigatory_filds = [
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
        "email",
        "zip_code",
        "zone"
    ];

    public $fieldsDigitalizedDocuments = ["field1"=>null];
    public $caracteristics = [];

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
        "reference_point" => "ponto de referência",
        "cell" => "celular",
        "telephone" => "telefone",
        "email" => "email",
        "zip_code" => "cep",
        "height" => "altura"
    ];


    public $selectedTab;

    public $fieldsFeatures = [
        "name" => ""
    ];

    public $fields = [
        "name" => "",
        "file_capture_image" => "",
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
        "genre_id" => "",
        "genre_biologic_id" => "",
        "rg_gemeo" => "",
        "name_gemeo" => "",
        "name_social" => "",
        "social_name_visible" => "",
        "type_of_certificate_new" => "",
        "names_previous" => "",
        "filitions_previous" => "",
        "cni" => "",
        "national_card_sus" => "",
        "voter_registration" => "",
        "number_voter" => "",
        "zone_voter" => "",
        "section" => "",
        "national_drivers_license" => "",
        "reservist_certificate" => "",
        "blood_type" => "",
        "rh_factor" => "",
        "professional_identity_1" => "",
        "professional_id_number_1" => "",
        "professional_identity_acronym_1" => "",
        "professional_identity_2" => "",
        "professional_id_number_2" => "",
        "professional_identity_acronym_2" => "",
        "uf_professional_identity" => "",
        "social_security_work_card" => "",
        "ctps_number" => "",
        "serie_wallet" => "",
        "uf_wallet" => "",
        "cid_wallet" => "",
        "district" => "",
        "height" => "",
        "features" => "",
        "digitalized_documents" => ""
    ];

    public $curretTypeStreet;
    public $currentCountry;
    public $idCitizen;
    public $zone;

    public $registrySuspension;

    public $naturalized = false;

    public $listeners = ['selectedCountry', 'selectedCounty', 'selectedMaritalStatus','justificativaEvent',
        'selectedGenre', 'selectedUf', 'selectedCounty', 'selectedOccupation', 'selectedServiceStation',
        'selectedCountryTypeStreat', 'selectedTypeStreat', 'setCitizen', 'selectedUfCert', 'selectedCountyCert',
        'selectedRegistry', 'selectedUfIdent','selectedUfCarteira', 'setFaceCapture', 'setImagePreview', 'updated_feature', 'updated_uf_ident',
        'changeCitizenStatus', 'updateInfoIbge'
    ];

    public $citizen;
    public $currentGenre;
    public $currentMatiral;
    public $currentUfCarteira;


    public $currentUf;
    public $currentUfCert;
    public $currentCounty;
    public $currentCountyCert;

    public $currentOccupation;
    public $currentServiceStation;
    public $currentTypeStreet;


    public function viewCurrentProcess(){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/monitor/'.$this->process->id.'/edit',
        ]);
    }

    public function deleteDoc($urlbase){
        $base = $this->getFileNameAndExtension($urlbase);
        $fileName =  $base[0] .'.'. $base[1];

        $reformuledArray = $this->removeFileFromArray($urlbase, $this->fieldsDigitalizedDocuments);

        $citizen = Citizen::find($this->citizen->id);
        $citizen->update(['digitalized_documents' => \json_encode($reformuledArray) ]);

        $this->fieldsDigitalizedDocuments = $reformuledArray;

        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> "Documento removido com sucesso !"
        ]);
    }

    public function removeFileFromArray($filePath, $array) {
        $array = array_map(function($item) use ($filePath) {
          if ($item['file'] !== $filePath) {
            return $item;
          }
        }, $array);

        return array_filter($array); // remove valores nulos do array
    }

    public function getFileNameAndExtension($filePath) {
        $fileNameWithExtension = basename($filePath); // obtem o nome do arquivo com extensão
        $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME); // obtem o nome do arquivo sem extensão
        $fileExtension = pathinfo($fileNameWithExtension, PATHINFO_EXTENSION); // obtem a extensão do arquivo

        return [$fileName, $fileExtension];
    }


    public function selectedUfCert($id){
        $this->fields['uf_certificate'] = $id;
        $this->currentUfCert = Uf::find($id);
    }

    public function setAdjusted(){
        $user = auth()->user();

        $newDespatch = Dispatch::create([
            'user_id' =>  $user->id,
            'type' => 3,
            'process_id' => $this->process->id,
            'comment' => 'Ajuste da situação '.Process::SITUATION_TYPES_LABELS[$this->process->situation].' realizado. ',
            'statusString' => Process::SITUATION_TYPES_LABELS[$this->process->situation]
        ]);

        $this->process->update([
            'divergence' => false
        ]);

        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> "Ajuste realizado com sucesso !"
        ]);


    }

    public function updated_uf_ident($obj){
        $index = $obj[0];
        $value = $obj[1];
        $this->professionalIdentitysValues[$index]['uf_identy'] = $value;
    }

    public function changeCitizenStatus(Citizen $citizen){
        $this->citizen = $citizen;
    }

    public function updated_feature($object){
        $this->fieldsFeatures[$object[0]] = $object[1];
        #$this->dispatchBrowserEvent('reloadInputsSelect');
    }

    public function openModalProntuarioPrint($id){
        $this->dispatchBrowserEvent('openModalProntuarioPrint', [
            'id' => $id
        ]);
    }

    public function setFaceCapture($imageBase64){
        $this->file_capture_image_string = $imageBase64;
    }

    public function setImagePreview($imageBase64){
        $this->file_capture_image_preview = $imageBase64;
    }

    public function selectedUfIdent($id){
        $this->fields['uf_professional_identity'] = $id;
        $this->currentUfIdent = Uf::find($id);
    }

    public function selectedUfCarteira($id){
        $this->fields['uf_wallet'] = $id;
        $this->currentUfIdent = Uf::find($id);
    }

    public function selectedRegistry($id){
        $this->fields['registry_id'] = $id;
        $this->registrySuspension = Registry::find($id);
    }

    public function selectedCountyCert($id){
        $this->fields['county_certificate'] = $id;
        $this->currentCountyCert = County::find($id);
    }

    public function selectedTypeStreat($id)
    {
        $RURAL_ZONE = 1;
        $this->fields['type_street_id'] = $id;
        $this->curretTypeStreet = TypeStreet::find($id)->name_type_street;
    }


    public function changeRegistration(){

        $CnsString = substr($this->fields['matriculation'], 0, 6);
        $civilRegistration = substr($this->fields['matriculation'], 7, 2);
        $civilRegistryService = substr($this->fields['matriculation'], 10, 2);
        $birth_year = substr($this->fields['matriculation'], 13, 4);
        $typeOfCertificate = substr($this->fields['matriculation'], 18, 1);
        $bookNumber = substr($this->fields['matriculation'], 20, 5);
        $sheet_number = substr($this->fields['matriculation'], 26, 3);
        $n_do_termo = substr($this->fields['matriculation'], 29, 9);
        $verifyingDigit = substr($this->fields['matriculation'], 29, 9);
        $birth_date = $this->citizen->birth_date ?? $this->fields['birth_date'];

        $check = new CheckRegistration();
        $tempRegistry = Registry::where('cns', ltrim($CnsString, "0") )->first();
        if(isset($tempRegistry->id)){
            $this->registrySelected =  $tempRegistry;
        }

        $this->currentRegistryId = $tempRegistry->id ?? null;

        $resultValidation = $check->call([
            "dou_certificate_date" => $this->fields['dou_certificate_date'],
            "certificate_entry_date" => $this->fields['certificate_entry_date'],
            "registry" => $this->registrySelected,
            "birth_date" => $birth_date,
            "cns" => $CnsString,
            "civilregistration" => $civilRegistration,
            "civilregistryservice" => $civilRegistryService,
            "birth_year" => $birth_year,
            "typeofcertificate" => $typeOfCertificate,
            "booknumber" => $bookNumber
        ]);
        $this->fields['type_of_certificate_new'] = $typeOfCertificate;
        $this->registrationError = $resultValidation["result"];
        $this->traceErrorsMatriculation = $resultValidation["debug"];
    }

    public function checkBlockedCertificate($registry_id){
        if(!$registry_id){
            return false;
        }

        $blocked = BlockedCertificate::where('registry_id', $registry_id)
        ->where('book_number', $this->fields["book_number"])
        ->where('book_letter', $this->fields["book_letter"])
        ->where('sheet_number', $this->fields["sheet_number"])
        ->first();

        return isset($blocked->id);
    }

    public function addedDocument(){

        if(count($this->fieldsDigitalizedDocuments) == 1){

            $item = [];
            $item['file'] = $this->tempFile;
            $item['type'] = $this->fieldsDigitalizedDocuments['field1']['type'];

            $this->fieldsDigitalizedDocuments['field1'] = $item;
            $this->jaUtilizados[] = $this->fieldsDigitalizedDocuments['field1']['type'];
            $countDocuments = count($this->fieldsDigitalizedDocuments) + 1;
            $this->fieldsDigitalizedDocuments['field'.$countDocuments] = $item;
            return ;
        }

        $countDocuments = count($this->fieldsDigitalizedDocuments) + 1;


        $this->jaUtilizados[] = $this->fieldsDigitalizedDocuments['field'.count($this->fieldsDigitalizedDocuments)]['type'];

        $item = [];
        $item['file'] = "";
        $item['type'] = "";
        $this->fieldsDigitalizedDocuments['field'.$countDocuments] = $item;
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


    public function selectedOccupation($value){
        $this->fields['occupation_id'] = $value;
        $this->currentOccupation = Occupation::find($value)->name;
    }
    public function selectedCounty($value){
        if(!$value){
            return false;
        }

        $this->fields['county_id'] = $value;
        $this->currentCounty = County::find($value)->name;
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

    public function getMAC2(){

    }

    public function getMAC(){
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
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

    public function getDocument($index){
        $documents = [
            "1" => "CPF",
            "2" => "PIS",
            "3" => "PASEP",
            "4" => "COMPROVANTE DE ENDEREÇO",
            "5" => "Laudo Médico",
            "6" => "TITULO ELEITOR",
            "7" => "IDENTIFICAÇÃO PROFISSIONAL",
            "8" => "CARTEIRA DE TRABALHO E PREVIDENCIA SOCIAL – CTPS",
            "9" => "CARTEIRA NACIONAL DE HABILITAÇÃO – CNH",
            "10" => "CERTIFICADO MILITAR",
            "11" => "EXAME TIPO SANGUINEO/FATOR RH",
            "12" => "COMPROVANTE DE VULNERABILIDADE OU A CONDIÇÃO PARTICULAR DE SAÚDE",
            "13" => "CARTÃO DE BENEFICIO SOCIAL",
            "14" => "ENCAMINHAMENTO SOCIAL",
            "15" => "BOLETIM DE OCORRENCIA",
            "16" => "DECLARAÇÃO DE NOME SOCIAL",
            "17" => "CERTIDÃO DE CASAMENTO",
            "18" => "CERTIDÃO DE CASAMENTO/DIVORCIADO",
            "19" => "CERTIDÃO DE NASCIMENTO",
            "20" => "Certidão de casamento/COM AVERBAÇÃO DE SEPARAÇÃO",
            "21" => "Certidão de casamento/CASAMENTO COM AVERBAÇÃO DE ÓBITO",
            "22" => "CERTIDÃO DE NASCIMENTO/CASAMENTO ESTRANGEIRA",
            "23" => "PRONTUÁRIO CIVIL",
            "24" => "INDIVIDUAL DATILOSCÓPICA",
            "25" => "CERTIDÃO DE CASAMENTO",
            "26" => "CERTIDÃO DE NASCIMENTO",
            "27" => "DIÁRIO OFICIAL DA UNIÃO-DOU",
            "28" => "CERTIDÃO DE OPÇÃO DE NACIONALIDADE",
            "29" => "CARTEIRA DE IDENTIDADE DE ESTRAGEIRO",
            "30" => "CARTEIRA DE AUTISTA"
        ];

        return $documents[$index];
    }

    public function getUfs(){
        $this->ufs = Uf::get();
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

        $dou_certificate_date = $this->formateDateBR($citizen['dou_certificate_date']);
        $birth_date = $this->formateDateBR($citizen['birth_date']);
        $certificate_entry_date = $this->formateDateBR($citizen['certificate_entry_date']);


        if($citizen['uf_professional_identity']){
            $this->currentUfIdent = Uf::find($citizen['uf_professional_identity']);
        }

        if($citizen['cid_wallet']){
            $this->currentUfCarteira = Uf::find($citizen['cid_wallet']);
        }

        $this->callProcess();

        $this->other_genre = $genre->id == 3 ? true : false;

        $other_filiations = json_decode($citizen->other_filiations);

        foreach ($other_filiations as  $key =>  $value) {
            $this->otherFiliationsValues[] = $value;
            $key = $key + 3;
            $this->otherFiliations[] = "Filiação ".$key;
        }

        //dd($citizen );
        $this->currentUfCert = Uf::find($citizen['uf_certificate']);
        $this->currentCountyCert = County::find($citizen['county_certificate']);

        $this->zone = $citizen->zone;

        $this->professionalIdentitysValues = \json_decode($citizen['professional_identitis']);



        foreach ($this->professionalIdentitysValues as $key => $item) {
            $this->professionalIdentitys[] = "Identidade profissional".$key;
        }

        if(isset($citizen['country_type_street_id'])){
            $type_street = CountryTypeStreat::find($citizen['country_type_street_id']);
        }

        if(isset($citizen['type_street_id'])){
            $type_street = TypeStreet::find($citizen['type_street_id']);
        }

        if (isset($citizen['type_street_id'])) {
            $this->registrySuspension = Registry::find($citizen->registry_id);
        }


        $this->fieldsFeatures = \json_decode($citizen->features, true);

        $this->fieldsDigitalizedDocuments = \json_decode($citizen->digitalized_documents, true);

        //dd($this->fieldsDigitalizedDocuments);

        foreach ($this->fieldsDigitalizedDocuments  as $item) {
            $this->jaUtilizados[] = $item['type'];
        }

        $item = new \stdClass;
        $item->file = $this->tempFile;
        $item->type = "";
        $this->fieldsDigitalizedDocuments['field'.count($this->fieldsDigitalizedDocuments ) + 1] = $item;

        if (isset($citizen->id)) {
            $this->fields = [
                "name" => $citizen->name,
                "district" => $citizen->district,
                "id" => $citizen->id,
                "cpf" => $citizen->cpf,
                "rg" => $citizen->rg,
                "filiation1" => $citizen->filiation1,
                "filiation2" => $citizen->filiation2,
                "other_filiations" => "",
                "birth_date" => $birth_date,
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
                "certificate_entry_date" => $certificate_entry_date,
                "same_sex_marriage" => $citizen->same_sex_marriage,
                "registry_id" => $citizen->registry_id,
                "book_number" => $citizen->book_number,
                "term_number" => $citizen->term_number,
                "book_letter" => $citizen->book_letter,
                "sheet_number" => $citizen->sheet_number,
                "dou_certificate_date" => $dou_certificate_date ,
                "genre_biologic_id" => $citizen->genre_biologic_id,
                "rg_gemeo" => $citizen->rg_gemeo,
                "name_gemeo" => $citizen->name_gemeo,
                "name_social" =>  $citizen->name_social,
                "social_name_visible" => $citizen->social_name_visible,
                "type_of_certificate_new" => $citizen->type_of_certificate_new,
                "names_previous" => $citizen->names_previous,
                "filitions_previous" => $citizen->filitions_previous,

                "cni" => $citizen->cni,
                "national_card_sus" => $citizen->national_card_sus,
                "voter_registration" => $citizen->voter_registration,
                "number_voter" => $citizen->number_voter,
                "zone_voter" => $citizen->zone_voter,
                "section" => $citizen->section,
                "national_drivers_license" => $citizen->national_drivers_license,
                "reservist_certificate" => $citizen->reservist_certificate,
                "blood_type" => $citizen->blood_type,
                "rh_factor" => $citizen->rh_factor,
                "professional_identity_1" => $citizen->professional_identity_1,
                "professional_id_number_1" => $citizen->professional_id_number_1,
                "professional_identity_acronym_1" => $citizen->professional_identity_acronym_1,
                "uf_professional_identity" => $citizen->uf_professional_identity,
                "social_security_work_card" => $citizen->social_security_work_card,
                "ctps_number" => $citizen->ctps_number,
                "serie_wallet" => $citizen->serie_wallet,
                "uf_wallet" => $citizen->uf_wallet,
                "cid_wallet" => $citizen->cid_wallet,
                "height" => $citizen->height,
                "features" =>  $this->fieldsFeatures,
                "digitalized_documents" => $this->fieldsDigitalizedDocuments
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

    public function callProcess(){
        $process = \App\Models\Process::where('citizen_id', $this->citizen->id )
        ->where('situation','!=', \App\Models\Process::RECEIVED_BY_THE_POST_RESPONSIBLE_AND_FINALIZED_DELIVERED)
        ->where('situation','!=', \App\Models\Process::HAND_OVER_TO_THE_POST_PERSON_IN_CHARGE)
        ->where('situation','!=', \App\Models\Process::RECEIVED_BY_THE_POST_RESPONSIBLE_AND_FINALIZED_DELIVERED)
        ->where('situation','!=', \App\Models\Process::CANCELED)
        ->where(function ($query) {
            $query->where('user_id', Auth::user()->id)
            ->orWhere('to_user_id', Auth::user()->id);
        })
        ->first();

        // Se não existir um usuario ele verificar a existencia de um status vinculado ao service station
        if (!$process) {
            $meServiceStations = auth()->user()->userStations->toArray();

            $serviceStationIds = array_map(function ($item) {
                return $item['service_station_id'];
            }, $meServiceStations);

            $process = \App\Models\Process::where('citizen_id', $this->citizen->id )
            ->where('situation','!=', \App\Models\Process::RECEIVED_BY_THE_POST_RESPONSIBLE_AND_FINALIZED_DELIVERED)
            ->where('situation','!=', \App\Models\Process::HAND_OVER_TO_THE_POST_PERSON_IN_CHARGE)
            ->where('situation','!=', \App\Models\Process::RECEIVED_BY_THE_POST_RESPONSIBLE_AND_FINALIZED_DELIVERED)
            ->where('situation','!=', \App\Models\Process::CANCELED)->whereIn('to_service_station_id', $serviceStationIds)->first();
        }

        $this->process = $process;
        if(isset($process->id)){
           $this->process =  $process;
        }
    }

    public function getCharacteristics(){
        $this->caracteristics  = (new CitizenRepository())->getCharacteristics();

    }

    public function justificativaEvent($justificativa){
        $this->justificationSign = $justificativa;

    }

    public function createAttachmentSignature(){
        $this->validate([
            'signFile' => 'image|max:1024', // 1MB Max
        ]);
        $result = $this->signFile->store('assinaturas');
        $this->fileSign = $result;

        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> "Assinatura salva com sucesso !"
        ]);

        $this->dispatchBrowserEvent('closeModalSign',[
            'type'=> 'success'
        ]);


    }

    public function mount(){
        $this->getUfs();
        if(isset($this->citizen->id)){
            $this->setCitizen($this->citizen->id);
        }else{
            $service_station_session = session('service_station');
            if(isset($service_station_session)){ 
            $this->fields['service_station_id'] = $service_station_session->id;
            $this->currentServiceStation = $service_station_session->service_station_name;
            }
            $this->dispatchBrowserEvent("openModalSearch");
        }
    }

    public function render()
    {
        $this->getCharacteristics();
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
        $this->otherFiliations[] = "Filiação ".$this->filiationCount;
    }

    public function addNewProfessionalIdentitys(){
        $this->professionalIdentitysCount++;
        $this->professionalIdentitys[] = "Identidade profissional".$this->filiationCount;
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

    public function saveImageFacial(){
        $image = $this->file_capture_image_string;


        $directory = storage_path(). '/app/public/face_captures/';
        if (!Storage::exists($directory)) {
            Storage::makeDirectory($directory);
        }
        $imageName = Str::random(12).'.'.'png';
        \File::put(storage_path(). '/app/public/face_captures/' . $imageName, $image);
        $this->fields["file_capture_image"] =  $imageName;
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


        if(isset($this->fields["registry_id"])){
            if($this->checkBlockedCertificate($this->currentRegistryId)){

                array_push($errors, [
                    "message" => "Esta certidão está bloqueada",
                    "valid" => false,
                ]);
            }
        }


        if(trim($this->fields['filiation1']) == "" && $this->fields['filiation2'] == "" ){
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

        if($this->fields['genre_id'] == "3"){

            if(isset($this->fields['genre_biologic_id']) && $this->fields['genre_biologic_id'] == '0'){
                array_push($errors, [
                    "message" => "O campo sexo biologico é obrigatorio",
                    "valid" => false,
                ]);
                $this->errorsKeys[] = "genre_biologic_id";
            }
        }


        if($this->zone == $ZONE_URBANA){
            $fileds_validation = [/* "provenance", */ "number", "address"];

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


        if(count($this->fieldsDigitalizedDocuments) > 1){
            $documents = array_filter($this->fieldsDigitalizedDocuments, function($doc) {
                return $doc['file'] != "";
            });
        }else{
            $documents = [];
        }

        if($this->fields['certificate'] == "1"){
            if($this->registrationError == false){
                array_push($errors, [
                    "message" => "Matricula incorreta.",
                    "valid" => false,
                ]);
            }
        }



        if(count($documents) == 0){
            array_push($errors, [
                "message" => "Adicione pelo menos certidão como anexo, na aba documentos",
                "valid" => false,
            ]);
        }

        $fileds_validation_date = ["dou_certificate_date"];

        foreach ($fileds_validation_date as $value) {
            if(empty($this->fields[$value]) && $this->checkDataIsValid($value)){

                $value = $this->getTranslaction($value);

                    array_push($errors, [
                        "message" => "O campo {$value} é obrigatorio",
                        "valid" => false,
                    ]);
            }

        }

        $this->errorsKeys[] = $value;


        return $errors;
    }

    public function checkDOC($doc){
        $this->jaUtilizados[] = $doc;

    }

    public function checkDataIsValid($dateStr, $format = "Y-m-d")
    {
	    $dateFormated = explode("/",$dateStr);

        if(!count($dateFormated) > 2){
            return false;
        }

        try {
            $formateToAmericamFormat = $dateFormated[2].'-'.$dateFormated[1].'-'.$dateFormated[0];
        } catch (\Exception $e) {
              return false;
        }



        date_default_timezone_set('UTC');
        $date = \DateTime::createFromFormat($format, $formateToAmericamFormat);
        return $date && ($date->format($format) === $formateToAmericamFormat);
    }

    public function formateDateBR($date){
        $explodedDate = explode("-", $date);
        $formatedBr = $explodedDate[2]."/".$explodedDate[1]."/".$explodedDate[0];
        return $formatedBr;
    }

    public function formateDateUSA($date){
        return implode('-', array_reverse(explode('/', $date)));
    }

    public function storeDocuments($documents){
        foreach ($documents as &$doc){
            if($doc['file'] != "" && ! is_string($doc['file'])){
                $path = $doc['file']->store('public');
                $doc['file'] = $path;
            }
        }

        $documents = array_filter($documents, function($doc) {
            return $doc['file'] != "";
        });
        return $documents;
    }

    public function saveImageFacialString(){
        if(!$this->file_capture_image){
            return false;
        }

        $this->validate([
            'file_capture_image' => 'image|max:1024', // 1MB Max
        ]);

        $filename = $this->file_capture_image->store('public/face_captures');

        $filename = basename($filename);


        $this->fields["file_capture_image"] = $filename;
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

        $dou_certificate_date = $this->formateDateUSA($this->fields["dou_certificate_date"] );
        $birth_date = $this->formateDateUSA($this->fields["birth_date"] );
        $certificate_entry_date = $this->formateDateUSA($this->fields["certificate_entry_date"] );


        $documents = $this->storeDocuments($this->fieldsDigitalizedDocuments);

        if($this->file_capture_image_string){
            $this->saveImageFacial();
        } else {
            $this->saveImageFacialString();

        }

        $user = (new CitizenRepository())->createOrUpdateCitizen($this->citizen->id ?? 0, [
            "name" => $this->fields["name"],
            "file_capture_image" => $this->fields["file_capture_image"] ?? $this->citizen->file_capture_image,

            "cpf" => $this->fields["cpf"],
            "district" => $this->fields["district"],
            "rg" => $this->fields["rg"],
            "filiation1" => $this->fields["filiation1"],
            "filiation2" => $this->fields["filiation2"],
            "filiation3" => $this->fields["filiation2"],
            "birth_date" => $birth_date,
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
            "genre_biologic_id" => $this->fields["genre_biologic_id"],
            "professional_identitis" => \json_encode($this->professionalIdentitysValues),
            "file_sign" => $this->fileSign,
            "justification_sign" => $this->justificationSign,
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
            "certificate_entry_date" => $certificate_entry_date ?? null,
            "same_sex_marriage" => $this->fields["same_sex_marriage"] ?? null,
            "dou_certificate_date" => $dou_certificate_date,
            "uf_certificate" => $this->fields["uf_certificate"] ?? null,
            "county_certificate" => $this->fields["county_certificate"] ?? null,
            "previous_registration_certificate" => $this->fields["previous_registration_certificate"] ?? null,
            "matriculation" => $this->fields["matriculation"] ?? null,
            "name_place" => $this->fields["name_place"] ?? null,
            "registry_id" => $this->fields["registry_id"] ?? $this->currentRegistryId,
            "rg_gemeo" => $this->fields["rg_gemeo"] ?? null,
            "name_gemeo" => $this->fields["name_gemeo"] ?? null,
            "name_social" => $this->fields["name_social"] ?? null,
            "social_name_visible" => $this->fields["social_name_visible"] ?? null,
            "type_of_certificate_new" => $this->fields["type_of_certificate_new"] ?? null,
            "names_previous" =>  $this->fields["names_previous"] ?? null,
            "filitions_previous" =>  $this->fields["filitions_previous"] ?? null,

            "cni" =>  $this->fields["cni"] ?? null,
            "national_card_sus" =>  $this->fields["national_card_sus"] ?? null,
            "voter_registration" =>  $this->fields["voter_registration"] ?? null,
            "number_voter" =>  $this->fields["number_voter"] ?? null,
            "zone_voter" =>  $this->fields["zone_voter"] ?? null,
            "section" =>  $this->fields["section"] ?? null,
            "national_drivers_license" =>  $this->fields["national_drivers_license"] ?? null,
            "reservist_certificate" => $this->fields["reservist_certificate"] ?? null,
            "blood_type" => $this->fields["blood_type"] ?? null,
            "rh_factor" => $this->fields["rh_factor"] ?? null,
            "professional_identity_1" => $this->fields["professional_identity_1"] ?? null,
            "professional_id_number_1" => $this->fields["professional_id_number_1"] ?? null,
            "professional_identity_acronym_1" => $this->fields["professional_identity_acronym_1"] ?? null,

            "social_security_work_card" => $this->fields["social_security_work_card"] ?? null,
            "ctps_number" => $this->fields["ctps_number"] ?? null,
            "serie_wallet" => $this->fields["serie_wallet"] ?? null,
            "uf_wallet" => $this->fields['uf_wallet'] ?? null,
            "cid_wallet" => $this->fields["cid_wallet"] ?? null,
            "height" => $this->fields["height"] ?? null,
            "features" => \json_encode($this->fieldsFeatures) ?? null,
            "digitalized_documents" => \json_encode($documents) ?? null,
            "uf_professional_identity" => $this->currentUfIdent->id ?? null
         ]);

        if(is_array($user)){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'error',
                'message'=> $user[0]["message"]
            ]);
            return false;
        }  else {
            $this->openModalProntuarioPrint($user->id);
        }

        $process = new GenerateProcess();
        $payment_situation = $this->is_payment_free || ($user->via_rg == 1) ? Process::PAYMENT_FREE : Process::PAYMENT_PENDING ;
        $resultProcess = $process->call([
            "user_id" =>  Auth::user()->id,
            "process" => date('m')."/".date('Y'),
            "citizen_id" => $user->id,
            "service_station" => $user->service_station_id,
            "biometrics_status" => 1,
            "situation" => 1,
            "payment" => $payment_situation,
            "name" => $this->fields["name"]
        ]);

        $citizen = Citizen::find($user->id);
        $citizen->update([
            'process' => $resultProcess['code']
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

    public function updateInfoIbge($request)
    { 
        $this->fields['address'] = $request['logradouro'];
        $this->fields['district'] = $request['bairro'];
    }

}
