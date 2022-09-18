<?php

namespace App\Http\Livewire\UfSelect;

use App\Models\Uf;
use Livewire\Component;


class UfSelect extends Component
{
    public $query;
    public $maritalStatus;
    public $selectedId;
    public $closed = false;
    public $highlightIndex;
    public $selectedValue;
    public $ufs = [];

    protected $listeners = ['clearServiceStationField'];

    public function mount()
    {
        $this->resetValue();
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
        $contact = $this->ufs[$this->highlightIndex] ?? null;
        if ($contact) {
            $this->redirect(route('show-contact', $contact['id']));
        }
    }

    public function updatedQuery()
    {
        $this->closed = false;
        $this->ufs = Uf::where('name', 'ilike', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function selectItem($id, $value){

        $this->query = $value;
        $this->selectedId = $id;
        $this->selectedValue = $value;
        $this->closed = true;
        $this->emitUp('selectedUf', $id);
    }


    public function render()
    {
        return view('livewire.ufSelect.uf-index');
    }

}
