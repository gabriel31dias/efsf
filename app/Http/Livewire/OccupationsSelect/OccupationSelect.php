<?php

namespace App\Http\Livewire\OccupationsSelect;

use App\Models\Occupation;
use Livewire\Component;


class OccupationSelect extends Component
{
    public $query;
    public $occupations;
    public $selectedId;
    public $closed = false;
    public $highlightIndex;
    public $selectedValue;
    public $servicesPoints = [];
    public $occupation ;
    protected $listeners = ['clearServiceStationField', 'setOccupation'];

    public function mount()
    {
        $this->reset1();
        $this->currentOccupation();
    }

    public function currentOccupation(){
        $this->query = $this->occupation;
    }

    public function setOccupation($value){
        $this->query = $value;
    }

    public function reset1()
    {
        $this->query = '';

        $this->selectedId = '';
        $this->occupations = [];
        $this->highlightIndex = 0;
    }

    public function clearServiceStationField(){
        $this->query = null;
    }

    public function incrementHighlight()
    {
        $this->closed = false;
        if ($this->highlightIndex === count($this->occupations) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {

        $this->selectedId = '';
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->occupations) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $occupation = $this->occupations[$this->highlightIndex] ?? null;
        if ($occupation) {
            $this->selectItem($occupation['id'], $occupation['name']);
        }
    }

    public function updatedQuery()
    {
        $this->closed = false;
        $this->occupations = Occupation::where('name', 'ilike', '%' . $this->query . '%')->take(30)
            ->get()
            ->toArray();
    }

    public function selectItem($id, $value){
        $this->query = $value;
        $this->selectedId = $id;
        $this->selectedValue = $value;
        $this->closed = true;
        $this->emitUp('selectedOccupation', $id);
    }


    public function render()
    {
        return view('livewire.occupationSelect.occupation-index');
    }

}
