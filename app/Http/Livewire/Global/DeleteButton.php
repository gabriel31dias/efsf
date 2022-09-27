<?php

namespace App\Http\Livewire\Global;

use Illuminate\Support\Facades\URL;
use Livewire\Component;

class DeleteButton extends Component
{
    public $modal = false;
    public $objectModel; 
    public $type = 'large';
    public $previous; 
    public $redirectBack = false; 
    public $deleteEvent = null;
    public function render()
    {
        switch($this->type){ 
            case 'large': 
                return view('livewire.global.delete-button-large');
            case 'table': 
                return view('livewire.global.delete-button-table');
        }

    }

    public function mount()
    {
        $this->previous = URL::previous();
    }

    public function delete()
    {
        try {
            $this->objectModel->delete();
            $this->modal = false;
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Registro deletado com sucesso!"
            ]);

            if($this->deleteEvent){ 
                $this->emit($this->deleteEvent);
            }
            
            if($this->redirectBack){ 
                $this->dispatchBrowserEvent('redirect',[
                    'url'=> $this->previous,
                    'delay' => 1000
                ]);
            }

        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function openModal(){
        $this->dispatchBrowserEvent('triggerDelete');
    }
}
