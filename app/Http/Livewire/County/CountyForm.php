<?php

namespace App\Http\Livewire\County;

use App\Models\County;
use Livewire\Component;

class CountyForm extends Component
{

    public $county;
    public $action;
    public $uf; 
    public $countyRelation; 

    public $is_district = false;

    public $fields = [
        "name" => "", 
        "uf_id" => null,
        "code" => null,
        "county_id" => null
    ];

    protected $rules = [
        'fields.name' => 'required',
        'fields.uf_id' => 'required',
        'fields.county_id' => 'required_if:is_district,true'
    ];

    protected $messages = [
        "fields.*.required" => "Campo obrigatório",
        "fields.county_id.required_if" => "Campo obrigatório para os distritos"
    ];

    protected $listeners = ['selectedUf', 'selectedCounty']
;
    public function render()
    {
        return view('livewire.county.county-form');
    }

    public function mount()
    {
        if($this->county){
            $this->fields = $this->county->toArray();
            $this->uf = $this->county->uf;
            $this->countyRelation = $this->county->county; 
            $this->is_district = $this->county->is_district;
        }
    }

    public function save(){

        $this->validate();

        if($this->action == "create"){
            $county = County::create($this->fields);
        } else {
            $county = County::updateOrCreate(['id' => $this->county->id ],$this->fields);
        }

        if($county){
            $this->messageSuccess();
            $this->dispatchBrowserEvent('redirect',[
                'url'=> '/county',
                'delay' => 1000
            ]);
        }
    }

    public function messageSuccess(){
        if($this->action == "create"){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Localidade criada com sucesso."
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Localidade foi a com sucesso."
            ]);
        }
    }

    public function selectedUf($value){
        $this->fields['uf_id'] = $value;
    }

    public function selectedCounty($value){
        $this->fields['county_id'] = $value;
    }

}
