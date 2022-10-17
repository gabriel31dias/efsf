<?php

namespace App\Http\Livewire\Registry;

use App\Models\RegistryDate;
use Livewire\Component;

class RegistryDateModalCreate extends Component
{
    public $modal = false;
    public $registry_id;
    public $fieldsCreateDate = [
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
        'fieldsCreateDate.created_date' => 'required',
    ];

    protected $messages = [ 
        "fieldsCreateDate.*.required" => "Campo obrigatório",
    ];

    public function render()
    {
        return view('livewire.registry.registry-date-modal-create');
    }

    public function selectedRegistry($value) { 
        $this->fieldsCreateDate['incorporated_registry_id'] = $value;
        $this->ignore_number = RegistryDate::where('incorporated_registry_id', $this->fieldsCreateDate['incorporated_registry_id'])
                                ->where('registry_id', $this->registry_id)
                                ->pluck('collection_number')->toArray();
    }

    public function saveRegistry(){
        
        $this->validate(); 
        $this->fieldsCreateDate['registry_id'] = $this->registry_id;
        RegistryDate::create($this->fieldsCreateDate);
        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> "Data foi criada com sucesso."
        ]);
        $this->modal = false;
        $this->emit('refreshRegistryForm');
    }

    public function clearRegistry() { 
        $this->fieldsCreateDate = [
            'created_date' => null, 
            'closing_date' => null,
            'note' => '',
        ];
    }

}
