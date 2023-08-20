<?php

namespace App\Http\Livewire\FunctionSelect;

use App\Models\County;
use Livewire\Component;
use App\Models\Profession;


class FunctionSelect extends Component
{
    public $query;
    public $maritalStatus;
    public $selectedId;
    public $closed = false;
    public $highlightIndex;
    public $selectedValue;
    public $functions = [];
    public $function;

    public $unit;

    public $defaultValue;
    public $customEvent;

    protected $listeners = ['clearServiceStationField',  'selectedUnit'];

    public function mount()
    {

        $this->resetValue();
        $this->currentCounty();
        if(isset($this->defaultValue)) $this->selectItem($this->defaultValue->id, $this->defaultValue->name);
    }


    public function selectedUnit($unit){
        $this->unit = $unit;
    }

    public function currentCounty()
    {
        $this->query = $this->function;
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
        if ($this->highlightIndex === count($this->functions) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        $this->selectedId = '';
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->functions) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $function = $this->functions[$this->highlightIndex] ?? null;
        if ($function) {
            $this->selectItem($function['id'], $function['name']);
        }
    }

    public function updatedQuery()
    {
        $this->closed = false;

        if($this->unit){

            $this->functions = Profession::where('name', 'ilike', '%' . $this->query . '%')->where('unit_id', $this->unit)
            ->get()
            ->toArray();
        }
    }

    public function selectItem($id, $value){
        $this->query = $value;
        $this->selectedId = $id;
        $this->selectedValue = $value;
        $this->closed = true;

        if($this->customEvent){
            $this->emitUp($this->customEvent, $id);
        }else{
            $this->emitUp('selectedProfession', $id);
        }
    }


    public function render()
    {
        return view('livewire.functionSelect.function-select');
    }

}
