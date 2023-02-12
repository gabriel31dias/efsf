<?php

namespace App\Http\Livewire\Citizen;

use Livewire\Component;

class ModalChangeState extends Component
{

    public $citizen; 
    public $modal = false; 
    public $state;

    public function mount(){ 
        $this->state = $this->citizen->state;
    }

    public function render()
    {
        return view('livewire.citizen.modal-change-state');
    }

    public function updateState(){ 
        $this->citizen->state = $this->state; 
        $this->citizen->save();
        $this->modal = false;
        
        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> "Condição atualizada com sucesso! "
        ]);

    }
}
