<?php

namespace App\Http\Livewire\Uf;

use App\Models\Uf;
use Livewire\Component;

class UfForm extends Component
{
    public $action;
    public $uf; 

    public $fields = [
        "name" => "", 
        "acronym" => "",
        "code" => null,
    ];

    protected $rules = [
        'fields.name' => 'required',
        'fields.acronym' => 'required',
    ];

    protected $messages = [
        "fields.*.required" => "Campo obrigatório",
    ];

    public function render()
    {
        return view('livewire.uf.uf-form');
    }

    public function mount()
    {
        if($this->uf){
            $this->fields = $this->uf->toArray();
        }
    }

    public function save(){

        $this->validate();

        if($this->action == "create"){
            $uf = Uf::create($this->fields);
        } else {
            $uf = Uf::updateOrCreate(['id' => $this->uf->id ],$this->fields);
        }

        if($uf){
            $this->messageSuccess();
            $this->dispatchBrowserEvent('redirect',[
                'url'=> '/uf',
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
}
