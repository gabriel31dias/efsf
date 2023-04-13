<?php

namespace App\Http\Livewire\Citizen;

use Livewire\Component;
use Livewire\WithFileUploads;

class ModalChangeState extends Component
{
    use WithFileUploads; 

    public $citizen; 
    public $modal = false; 
    public $state;
    public $state_description; 
    public $document; 
    public $state_document = []; 

    public function mount(){ 
        $this->state = $this->citizen->state;
        $this->state_description  = $this->citizen->state_description; 
        $this->document = json_decode($this->citizen->state_document, 1) ?? [];

    }

    public function render()
    {
        return view('livewire.citizen.modal-change-state');
    }

    public function storeDocument(){ 
        if(isset($this->state_document['file'])){ 
            $path = $this->state_document['file']->store('public');
            return json_encode(['path' => $path, 'description' => $this->state_document['description'] ?? null]);
        }
        return json_encode([]);
    }

    public function updateState(){ 
        $document = $this->storeDocument();
        $this->citizen->state = $this->state; 
        $this->citizen->state_description = $this->state_description;
        $this->citizen->state_document = $document;
        $this->document = json_decode($this->citizen->state_document, 1) ?? [];
        $this->citizen->save();
        $this->modal = false;
        $this->emit('changeCitizenStatus', $this->citizen);
        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> "Condição atualizada com sucesso! "
        ]);

    }
}
