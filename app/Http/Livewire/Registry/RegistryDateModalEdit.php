<?php

namespace App\Http\Livewire\Registry;

use Livewire\Component;

class RegistryDateModalEdit extends Component
{
    public $modal = false;
    public $registryDate;
    public $fieldsUpdateDate = [
        'created_date' => null, 
        'closing_date' => null,
        'note' => '',
    ];


    protected $rules = [
        'fieldsUpdateDate.created_date' => 'required',
    ];

    protected $messages = [ 
        "fieldsUpdateDate.*.required" => "Campo obrigatório",
    ];

    public function render()
    {
        return view('livewire.registry.registry-date-modal-edit');
    }

    public function mount() {
        $this->fieldsUpdateDate['created_date'] = $this->registryDate->created_date->format('Y-m-d');
        $this->fieldsUpdateDate['closing_date'] = isset($this->registryDate->closing_date) ? $this->registryDate->closing_date->format('Y-m-d') : null;
        $this->fieldsUpdateDate['note'] = $this->registryDate->note;
    }

    public function saveRegistry(){
        
        $this->validate(); 
        $this->registryDate->update($this->fieldsUpdateDate);
        $this->modal = false;
        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> "Data foi atualizada com sucesso."
        ]);
        $this->emit('refreshRegistryForm');
    }

}