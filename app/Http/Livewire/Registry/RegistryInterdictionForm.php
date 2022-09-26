<?php

namespace App\Http\Livewire\Registry;

use App\Models\Registry;
use App\Models\RegistryInterdiction;
use Livewire\Component;

class RegistryInterdictionForm extends Component
{

    public $action;
    public $registryInterdiction;

    public $fields = [
        'registry_id' => '',
        'start_date' => '',
        'end_date' => '',
        'note' => '',
    ];

    protected $rules = [
        'fields.registry_id' => 'required',
        'fields.start_date' => 'required',
        'fields.end_date' => 'required',
    ];

    protected $messages = [ 
        "fields.*.required" => "Campo obrigatório",
    ];

    public $listeners = ['selectedRegistry'];

    public function render()
    {
        return view('livewire.registry.registry-interdiction-form');
    }

    public function mount()
    {
        if($this->registryInterdiction){
            $this->fields = $this->registryInterdiction->toArray();
        }
    }

    public function selectedRegistry($value) { 
        $this->fields['registry_id'] = $value;
    }

    public function saveRegistry(){
        
        $this->validate(); 

        if($this->action == "create"){ 
            $registry = Registry::findOrFail($this->fields['registry_id']);
            $registryInterdiction = $registry->interdictions()->create($this->fields);
        } else { 
            $registryInterdiction = RegistryInterdiction::updateOrCreate(['id' => $this->registryInterdiction->id ],$this->fields);
        }

        if($registryInterdiction){
            $this->messageSuccess();
            $this->dispatchBrowserEvent('redirect',[
                'url'=> '/registry-interdiction',
                'delay' => 1000
            ]);
        }
    }

    public function messageSuccess(){
        if($this->action == "create"){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Interdição criado com sucesso."
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Interdição foi atualizado com sucesso."
            ]);
        }
    }
}
