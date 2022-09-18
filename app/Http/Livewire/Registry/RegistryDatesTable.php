<?php

namespace App\Http\Livewire\Registry;

use App\Models\Registry;
use Livewire\Component;

class RegistryDatesTable extends Component
{
    public $dates;
    public $registry_id; 

    public $listeners = ['refreshRegistryForm'];

    public function render()
    {
        return view('livewire.registry.registry-dates-table');
    }

    public function refreshRegistryForm() { 
        $registry = Registry::findOrFail($this->registry_id);
        $this->dates = $registry->opening_dates;
    }

}
