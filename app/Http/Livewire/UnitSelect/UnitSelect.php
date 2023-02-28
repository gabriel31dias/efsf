<?php

namespace App\Http\Livewire\UnitSelect;

use App\Models\County;
use Livewire\Component;
use App\Models\Unit;


class UnitSelect extends Component
{
    public $query;
    public $maritalStatus;
    public $selectedId;
    public $closed = false;
    public $highlightIndex;
    public $selectedValue;
    public $units = [];
    public $unit;
    public $defaultValue;
    public $customEvent;

    protected $listeners = ['clearServiceStationField', 'setCounty'];

    public function mount()
    {
        $this->resetValue();
        $this->currentCounty();
        if(isset($this->defaultValue)) $this->selectItem($this->defaultValue->id, $this->defaultValue->name);
    }

    public function setCounty($value){
        $this->query = $value;
    }

    public function currentCounty()
    {
        $this->query = $this->unit;
    }

    public function resetValue()
    {
        $this->query = '';
        $this->selectedId = '';
        $this->maritalStatus = [];
        $this->highlightIndex = 0;
    }

    public function clearServiceStationField(){
        $this->query = null;
    }

    public function incrementHighlight()
    {
        $this->closed = false;
        if ($this->highlightIndex === count($this->units) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        $this->selectedId = '';
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->units) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $unit = $this->units[$this->highlightIndex] ?? null;
        if ($unit) {
            $this->selectItem($unit['id'], $unit['name']);
        }
    }

    public function updatedQuery()
    {
        $this->closed = false;
        $this->units = Unit::where('name', 'ilike', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function updatedUnit()
    {
        
    }




    public function selectItem($id, $value){
        $this->query = $value;
        $this->selectedId = $id;
        $this->selectedValue = $value;
        $this->closed = true;

        if($this->customEvent){
            $this->emitUp($this->customEvent, $id);
        }else{
            $this->emitUp('selectedUnit', $id);
        }
    }

    public function render()
    {
        return view('livewire.unitSelect.unit-select');
    }
}
