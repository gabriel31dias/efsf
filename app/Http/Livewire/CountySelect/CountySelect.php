<?php

namespace App\Http\Livewire\CountySelect;

use App\Models\County;
use Livewire\Component;


class CountySelect extends Component
{
    public $query;
    public $maritalStatus;
    public $selectedId;
    public $closed = false;
    public $highlightIndex;
    public $selectedValue;
    public $counties = [];
    public $county;

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
        $this->query = $this->county;
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
        $this->counties = County::where('name', 'ilike', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function selectItem($id, $value){

        $this->query = $value;
        $this->selectedId = $id;
        $this->selectedValue = $value;
        $this->closed = true;

        if($this->customEvent){
            $this->emitUp($this->customEvent, $id);
        }else{
            $this->emitUp('selectedCounty', $id);
        }
    }


    public function render()
    {
        return view('livewire.countySelect.county-select');
    }

}
