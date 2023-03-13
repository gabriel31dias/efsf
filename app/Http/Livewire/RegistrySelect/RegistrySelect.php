<?php

namespace App\Http\Livewire\RegistrySelect;

use App\Models\County;
use App\Models\Registry;
use Livewire\Component;


class RegistrySelect extends Component
{
    public $query;
    public $selectedId;
    public $closed = false;
    public $highlightIndex;
    public $selectedValue;
    public $registries = [];
    public $defaultValue = null;
    public $customEventSelect = null;
    public $county;
    public $is_transfer; 

    protected $listeners = ['filterCounty', 'filterCountyTransfer'];

    public function mount()
    {
        $this->resetValue();
        if(isset($this->defaultValue)) $this->selectItem($this->defaultValue->id, $this->defaultValue->name);
    }

    public function resetValue()
    {
            $this->selectedId = null;
            $this->query = '';
            $this->highlightIndex = 0;
    }

    public function clearServiceStationField(){
        $this->query = null;
    }

    public function incrementHighlight()
    {
        $this->closed = false;
        if ($this->highlightIndex === count($this->stations) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {

        $this->selectedId = '';
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->stations) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $contact = $this->stations[$this->highlightIndex] ?? null;
        if ($contact) {
            $this->redirect(route('show-contact', $contact['id']));
        }
    }

    public function updatedQuery()
    {
        $this->closed = false;
        $this->registries = Registry::where('name', 'ilike', '%' . $this->query . '%')->where(function($query) {
            if($this->county) { 
                $query->where('county_id', $this->county);
            }
        })->take(30)
            ->get()
            ->toArray();
    }

    public function filterCounty($county_id){ 
        if($this->is_transfer) return; 
        $this->county = $county_id;
    }

    public function filterCountyTransfer($county_id){ 
        if(!$this->is_transfer) return; 
        $this->county = $county_id;
    }

    public function selectItem($id, $value){

        $this->query = $value;
        $this->selectedId = $id;
        $this->selectedValue = $value;
        $this->closed = true;
        if(isset($this->customEventSelect)){
            $this->emitUp($this->customEventSelect, $id);
        } else {
            $this->emitUp('selectedRegistry', $id);
        }
    }


    public function render()
    {
        return view('livewire.registrySelect.registry-select');
    }

}
