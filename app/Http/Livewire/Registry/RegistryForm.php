<?php

namespace App\Http\Livewire\Registry;

use App\Models\Registry;
use Livewire\Component;

class RegistryForm extends Component
{
    public $action;
    public $registry;
    public $fields = [
        'sic_code' => '',
        'cns' => '',
        'name' => '',
        'fantasy_name' => '',
        'assignment' => 55,
        'holder_name' => '',
        'support_name' => '',
        'judge_name' => '',
        'note' => '',
        'allow_digit' => true,
        'uf_id' => '1',
        'county_id' => '1',
    ];

    protected $rules = [
        'fields.sic_code' => 'required',
        'fields.cns' => 'required',
        'fields.name' => 'required',
        'fields.uf_id' => 'required',
        'fields.county_id' => 'required',
    ];

    protected $messages = [ 
        "fields.*.required" => "Campo obrigatório",
    ];


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
