<?php

namespace App\Http\Livewire\Registry;

use App\Models\RegistryDate;
use Livewire\Component;

class RegistryDateModalEdit extends Component
{
    public $modal = false;
    public $registryDate;
    public $fieldsUpdateDate = [
        'created_date' => null, 
        'closing_date' => null,
        'note' => '',
        'incorporated_date' => null,
        'unincorporated_date' => null,
        'collection_number' => null,
        'incorporated_registry_id' => null,
    ];
    public $ignore_number = [];
    public $listeners = ['selectedRegistry'];


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
    public function selectedRegistry($value) { 
        $this->fieldsUpdateDate['incorporated_registry_id'] = $value;
        $this->ignore_number = RegistryDate::where('incorporated_registry_id', $this->fieldsUpdateDate['incorporated_registry_id'])
                                ->where('registry_id', $this->registryDate->registry_id)
                                ->pluck('collection_number')->toArray();
    }

    public function mount() {
        $this->fieldsUpdateDate['created_date'] = $this->registryDate->created_date->format('Y-m-d');
        $this->fieldsUpdateDate['closing_date'] = isset($this->registryDate->closing_date) ? $this->registryDate->closing_date->format('Y-m-d') : null;
        $this->fieldsUpdateDate['incorporated_date'] = isset($this->registryDate->incorporated_date) ? $this->registryDate->incorporated_date->format('Y-m-d') : null;
        $this->fieldsUpdateDate['unincorporated_date'] = isset($this->registryDate->unincorporated_date) ? $this->registryDate->unincorporated_date->format('Y-m-d') : null;
        $this->fieldsUpdateDate['incorporated_registry_id'] = $this->registryDate->incorporated_registry_id;
        $this->fieldsUpdateDate['collection_number'] = $this->registryDate->collection_number;
        $this->fieldsUpdateDate['note'] = $this->registryDate->note;
        $this->ignore_number = RegistryDate::where('incorporated_registry_id', $this->registryDate->incorporated_registry_id)
                                ->where('registry_id', $this->registryDate->registry_id)
                                ->where('id', '<>', $this->registryDate->id )
                                ->pluck('collection_number')->toArray();
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