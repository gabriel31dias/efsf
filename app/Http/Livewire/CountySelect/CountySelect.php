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
    public $uf;
    public $is_transfer;

    public $defaultValue;
    public $customEvent;

    protected $listeners = ['clearServiceStationField', 'setCounty', 'filterUf', 'filterUfTransfer'];

    public function mount()
    {
        $this->resetValue();
        $this->currentCounty();
        if(isset($this->defaultValue)) $this->selectItem($this->defaultValue->id, $this->defaultValue->name);
    }

    public function setCounty($value){
        if($value) $this->selectItem($value['id'], $value['name']);
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
        if ($this->highlightIndex === count($this->counties) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        $this->selectedId = '';
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->counties) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $county = $this->counties[$this->highlightIndex] ?? null;
        if ($county) {
            $this->selectItem($county['id'], $county['name']);
        }
    }

    public function updatedQuery()
    {
        $this->closed = false;
        $this->counties = County::where('name', 'ilike', '%' . $this->query . '%')->where(function($query) {
            if($this->uf) {
                $query->where('uf_id', $this->uf);
            }
        })->take(30)
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
            $this->emit($this->customEvent, $id);
        }else{
            $this->emitUp('selectedCounty', $id);
            $this->emit('filterCounty', $id);
        }
    }

    public function filterUf($uf_id){
        if($this->is_transfer) return;
        $this->uf = $uf_id;
    }

    public function filterUfTransfer($uf_id){
        if(!$this->is_transfer) return;
        $this->uf = $uf_id;
    }


    public function render()
    {
        return view('livewire.countySelect.county-select');
    }

}
