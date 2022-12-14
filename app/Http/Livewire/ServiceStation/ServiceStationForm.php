<?php

namespace App\Http\Livewire\ServiceStation;

use Livewire\Component;
use App\Models\Profile;
use App\Models\ServiceStation;
use App\Models\TypeStreet;

class ServiceStationForm extends Component
{

    public $errorsKeys = [];
    public $serviceStation;
    public $deliveryPoint;
    public $type_street;
    public $action;
    public $tempSelectedStation = null;
    public $isExternalDelivery = false;
    public $fields = [
        "service_station_name" => "",
        "acronym_post" => "",
        "type_of_post" => "",
        "city" => "",
        "cep" => "",
        "type_of_street" => "",
        "address" => "",
        "number" => "",
        "status" => true,
        "complement" => "",
        "district" => "",
        "uf" => "",
        "start_hour" => "",
        "end_hour" => "",
        "delivery_post_id" => null
    ];

    public $fieldsEvent = [
        "start_date" => "",
        "expiry" => "",
        "delivery_date" => "",
        "description" => "",
    ];

    function rules() {
        $id = '';
        if($this->serviceStation) $id = ',' .$this->serviceStation->id;
        return [
            "fields.service_station_name" => "required|unique:service_stations,service_station_name" . $id,
            "fields.acronym_post" => "required|unique:service_stations,acronym_post". $id,
            "fields.type_of_post" => "required",
            "fields.city" => "required",
            "fields.cep" => "required",
            "fields.type_of_street" => "required",
            "fields.address" => "required",
            "fields.number" => "required",
            "fields.complement" => "",
            "fields.district" => "required",
            "fields.uf" => "required",
            "fields.start_hour" => "required",
            "fields.end_hour" => "required",
            "fieldsEvent.start_date" =>  "required_if:fields.type_of_post," . ServiceStation::EVENTS_TYPE,
            "fieldsEvent.expiry" =>  "required_if:fields.type_of_post," . ServiceStation::EVENTS_TYPE,
            "fieldsEvent.delivery_date" =>  "required_if:fields.type_of_post," . ServiceStation::EVENTS_TYPE,


        ];
    }

    protected $messages = [
        "fields.*.required" => "Campo obrigatório",
        "fields.*.unique" => "Nome indisponivel",
        "fieldsEvent.*.required_if" => "Campo obrigatório para postos de evento."
    ];

    protected $listeners = ['selectedTypeStreat', 'selectedServiceStation', 'updateInfoIbge'];

    public function updateInfoIbge($request){
        $this->fields['address'] = $request['logradouro'];
        $this->fields['district'] = $request['bairro'];
        $this->fields['city'] = $request['cidade'];
        $this->fields['uf'] = $request['uf'];
    }

    public function selectedTypeStreat($idTypeStreat)
    {
        $this->fields['type_of_street'] = $idTypeStreat;
    }

    public function render()
    {
        return view('livewire.serviceStation.service-station-form');
    }

    public function mount()
    {
        if($this->serviceStation){
            $type_street = TypeStreet::where('id', $this->serviceStation->type_of_street)->first();
            $this->deliveryPoint = $this->serviceStation->delivery_point;
            $this->isExternalDelivery = isset($this->deliveryPoint) ? true : false;
            $this->type_street = $type_street->name_type_street ?? null;
            $event = $this->serviceStation->events()->first();
            $this->fieldsEvent = isset($event) ? $event->toArray() : $this->fieldsEvent;
            $this->fields = [
                "service_station_name" => $this->serviceStation->service_station_name,
                "acronym_post" => $this->serviceStation->acronym_post,
                "type_of_post" => $this->serviceStation->type_of_post,
                "status" => $this->serviceStation->status,
                "city" => $this->serviceStation->city,
                "cep" => $this->serviceStation->cep,
                "type_of_street" => $this->serviceStation->type_of_street,
                "address" => $this->serviceStation->address,
                "number" => $this->serviceStation->number,
                "complement" => $this->serviceStation->complement,
                "district" => $this->serviceStation->district,
                "uf" => $this->serviceStation->uf,
                "start_hour" => $this->serviceStation->start_hour,
                "end_hour" => $this->serviceStation->end_hour,
            ];
        }
    }

    public function saveStation(){

        $this->validate();

        if($this->action == "create"){
            $station = ServiceStation::create($this->fields);
            if($station->type_of_post == ServiceStation::EVENTS_TYPE){
                $station->events()->create($this->fieldsEvent);
            }
        } else {
            $station = ServiceStation::updateOrCreate(['id' => $this->serviceStation->id ],$this->fields);
        }

        if($station){
            $this->messageSuccess();
            $this->dispatchBrowserEvent('redirect',[
                'url'=> '/service-station',
                'delay' => 1000
            ]);
        }
    }

    public function messageSuccess(){
        if($this->action == "create"){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Posto de Atendimento criado com sucesso."
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Posto de Atendimento foi atualizado com sucesso."
            ]);
        }
    }

    public function enableDisableRegister(){
        $this->serviceStation->status = ! $this->serviceStation->status;
        $status = $this->serviceStation->status ? "habilitado" : "desabilitado";
        $this->serviceStation->save();
        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> "Perfil " . $status . " com sucesso."
        ]);
    }

    public function selectedServiceStation($id)
    {
        $this->tempSelectedStation = $id;
    }

    public function addServicePoint(){

        if($this->tempSelectedStation == null){
            return false;
        }

        $deliveryPoint = ServiceStation::find($this->tempSelectedStation);
        $this->fields['delivery_post_id'] = $this->tempSelectedStation;
        $this->tempSelectedStation = null;
        $this->deliveryPoint =  $deliveryPoint;
        $this->emit('clearServiceStationField');
    }

    public function handleChangeExternal(){
        if(!$this->isExternalDelivery){
            $this->deliveryPoint =  null;
        }
    }
}
