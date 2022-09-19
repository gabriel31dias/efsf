<?php

namespace App\Http\Livewire\MaritalStatusSelect;

use App\Models\MaritalStatus;
use Livewire\Component;


class MaritalStatusSelect extends Component
{
    public $query;
    public $maritalStatus;
    public $selectedId;
    public $closed = false;
    public $highlightIndex;
    public $selectedValue;
    public $servicesPoints = [];

    public $marital_status;

    protected $listeners = ['clearServiceStationField', 'setMaritalStatus'];

    public function mount()
    {
        $this->reset1();
    }

    public function setMaritalStatus($maritalStatus){
        $this->query = $maritalStatus;
    }

    public function reset1()
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
        $this->maritalStatus = MaritalStatus::where('name', 'ilike', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function selectItem($id, $value){

        $this->query = $value;
        $this->selectedId = $id;
        $this->selectedValue = $value;
        $this->closed = true;
        $this->emitUp('selectedMaritalStatus', $id);
    }


    public function render()
    {
        return view('livewire.maritalstatusSelect.maritalstatus-index');
    }

}
