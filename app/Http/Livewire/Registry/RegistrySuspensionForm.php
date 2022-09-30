<?php

namespace App\Http\Livewire\Registry;

use App\Models\Registry;
use App\Models\RegistrySuspension;
use Livewire\Component;

class RegistrySuspensionForm extends Component
{

    public $action;
    public $registrySuspension;

    public $fields = [
        'registry_id' => '',
        'start_date' => '',
        'end_date' => '',
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
        return view('livewire.registry.registry-suspension-form');
    }

    public function mount()
    {
        if($this->registrySuspension){
            $this->fields = $this->registrySuspension->toArray();
        }
    }

    public function selectedRegistry($value) { 
        $this->fields['registry_id'] = $value;
    }

    public function save(){
        
        $this->validate(); 

        if($this->action == "create"){ 
            $registry = Registry::findOrFail($this->fields['registry_id']);
            $registrySuspension = $registry->suspensions()->create($this->fields);
        } else { 
            $registrySuspension = RegistrySuspension::updateOrCreate(['id' => $this->registrySuspension->id ],$this->fields);
        }

        if($registrySuspension){
            $this->messageSuccess();
            $this->dispatchBrowserEvent('redirect',[
                'url'=> '/registry-suspension',
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
