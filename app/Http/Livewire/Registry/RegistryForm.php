<?php

namespace App\Http\Livewire\Registry;

use App\Models\Registry;
use Livewire\Component;

class RegistryForm extends Component
{
    public $action;
    public $registry;
    public $showCreate; 
    public $fields = [
        'cns' => '',
        'name' => '',
        'fantasy_name' => '',
        'assignment' => 55,
        'holder_name' => '',
        'support_name' => '',
        'judge_name' => '',
        'note' => '',
        'allow_digit' => 0,
        'uf_id' => '',
        'county_id' => '',
    ];

    public $fieldsCreateDate = [
        'created_date' => null, 
        'closing_date' => null,
        'note' => '',
    ];

    protected $rules = [
        'fields.cns' => 'required',
        'fields.name' => 'required',
        'fields.uf_id' => 'required',
        'fields.county_id' => 'required',
        'fieldsCreateDate.created_date' => 'required',
    ];

    protected $messages = [ 
        "fields.*.required" => "Campo obrigatório",
        "fieldsCreateDate.*.required" => "Campo obrigatório",
    ];

    public $listeners = [ 'selectedUf', 'selectedCounty' ];


    public function render()
    {
        return view('livewire.registry.registry-form');
    }

    public function mount()
    {
        if($this->registry){
            $this->fields = $this->registry->toArray();
        }
    }

    public function saveRegistry(){
        
        $this->validate(); 

        if($this->action == "create"){ 
            $registry = Registry::create($this->fields);
            if(!empty($this->fieldsCreateDate['created_date']) || !empty($this->fieldsCreateDate['closing_date'])){ 
                $registry->opening_dates()->create($this->fieldsCreateDate);
            }
        } else { 
            $registry = Registry::updateOrCreate(['id' => $this->registry->id ],$this->fields);
        }

        if($registry){
            $this->messageSuccess();
            $this->dispatchBrowserEvent('redirect',[
                'url'=> '/registry',
                'delay' => 1000
            ]);
        }
    }

    public function selectedCounty($value){
        $this->fields['county_id'] = $value;
    }

    public function selectedUf($value){
        $this->fields['uf_id'] = $value;
    }

    public function messageSuccess(){
        if($this->action == "create"){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Cartorio criado com sucesso."
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Cartorio foi atualizado com sucesso."
            ]);
        }
}
}
