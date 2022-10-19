<?php

namespace App\Http\Livewire\Feature;

use App\Models\Feature;
use Livewire\Component;

class FeatureForm extends Component
{

    public $feature;
    public $action;
    public $feature_option_name;
    public $feature_options = [];

    public $fields = [
        "name" => ""
    ];

    protected $rules = [
        'fields.name' => 'required',
        'feature_options' => 'required',

    ];

    protected $messages = [
        "fields.*.required" => "Campo obrigatório",
        "feature_options.required" => "Pelo menos uma caracteristica deve ser informada."
    ];

    public $listeners = ['refreshFeatureForm'];


    public function render()
    {
        return view('livewire.feature.feature-form');
    }

    public function mount()
    {
        if($this->feature){
            $this->fields = $this->feature->toArray();
            $this->feature_options = $this->feature->feature_options_names;
        }
    }

    public function saveFeature(){

        $this->validate();

        if($this->action == "create"){
            $feature = Feature::create($this->fields);
            foreach ($this->feature_options as $key => $options) {
                $feature->feature_options()->create(['name' => $options]);
            }
        } else {
            $feature = Feature::updateOrCreate(['id' => $this->feature->id ],$this->fields);
        }

        if($feature){
            $this->messageSuccess();
            $this->dispatchBrowserEvent('redirect',[
                'url'=> '/feature',
                'delay' => 1000
            ]);
        }
    }

    public function messageSuccess(){
        if($this->action == "create"){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Característica criado com sucesso."
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Característica foi atualizado com sucesso."
            ]);
        }
    }

    public function enableDisableRegister(){
        $this->feature->status = ! $this->feature->status;
        $status = $this->feature->status ? "habilitado" : "desabilitado";
        $this->feature->save();
        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> "Característica " . $status . " com sucesso."
        ]);
    }

    public function addFeatureOptions(){ 
        if(in_array($this->feature_option_name, $this->feature_options)) { 
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'warning',
                'message'=> "Nome de característica ja cadastrado ."
            ]);
            $this->feature_option_name = '';
            return;
        }
        if($this->action == "create"){ 
            $this->feature_options[] = $this->feature_option_name;
        } else { 
            $this->feature->feature_options()->create(['name' => $this->feature_option_name]);
            $this->feature = Feature::findOrFail($this->feature->id);
            $this->feature_option= $this->feature->feature_options;
        }
        $this->feature_option_name = '';

    }

    public function removeFeatureOption($value){ 
        if (($key = array_search($value, $this->feature_options)) !== false) {
            unset($this->feature_options[$key]);
        }
    }
    
    public function refreshFeatureForm() { 
        //ADICIONAR CHAMADA AQUI PARA REMOVER DOS CITIZENS AS CARACTERISTICAS REMOVIDAS
        
        $this->feature = Feature::findOrFail($this->feature->id);
        $this->feature_option= $this->feature->feature_options;

    }

}
