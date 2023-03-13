<?php

namespace App\Http\Livewire\UfSelect;

use App\Models\Uf;
use Livewire\Component;


class UfSelect extends Component
{
    public $query;
    public $maritalStatus;
    public $selectedId;
    public $uf;
    public $closed = false;
    public $highlightIndex;
    public $selectedValue;
    public $defaultValue;
    public $ufs = [];
    public $keyItem;

    public $customEvent;

    protected $listeners = ['clearServiceStationField', 'setUf'];

    public function mount()
    {
        $this->resetValue();

        $this->currentUf();

        if($this->defaultValue) $this->selectItem($this->defaultValue->id, $this->defaultValue->acronym);
    }

    public function currentUf(){
        $this->query = $this->uf;
    }

    public function setUf($uf){
        $this->query = $uf;
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
        if ($this->highlightIndex === count($this->ufs) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        $this->selectedId = '';
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->ufs) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $uf = $this->ufs[$this->highlightIndex] ?? null;
        if ($uf) {
            $this->selectItem($uf['id'],  $uf['acronym']);
        }
    }

    public function updatedQuery()
    {
        $this->closed = false;
        $this->ufs = Uf::where('acronym', 'ilike', '%' . $this->query . '%')
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
            $this->emitUp('selectedUf', $id);
            $this->emit('filterUf', $id);
        }
    }


    public function render()
    {
        return view('livewire.ufSelect.uf-index');
    }

}
