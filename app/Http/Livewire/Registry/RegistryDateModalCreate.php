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
    ];


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
