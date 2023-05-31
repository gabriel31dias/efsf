<?php

namespace App\Http\Livewire\Users;

use App\Models\CountryTypeStreat;
use App\Models\TypeStreet;

use Livewire\Component;

class TypestreetsSelect extends Component
{
    public $query;
    public $type_streets;
    public $typestreet;
    public $selectedId;
    public $closed = false;
    public $highlightIndex;
    public $selectedValue;
    public $typeStreat;
    public $type;


    public $listeners = ['setTypeStreet'];

    public function setTypeStreet($value){
       $this->query = $value;
    }

    public function curretTypeStreeat(){
        $this->query = $this->typestreet;
    }

    public function mount()
    {
        $this->reset1();
    }

    public function reset1()
    {
        $this->query = '';
        $this->curretTypeStreeat();
        $this->selectedId = '';
        $this->type_streets = [];
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        $this->closed = false;
        if ($this->highlightIndex === count($this->type_streets) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {

        $this->selectedId = '';
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->type_streets) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $type_streets = $this->type_streets[$this->highlightIndex] ?? null;
        if ($type_streets) {
            $this->selectItem($type_streets['id'], $type_streets['name_type_street']);
        }
    }

    public function updatedQuery()
    {
        $this->closed = false;
        if($this->type == "country_street"){
            $this->type_streets = CountryTypeStreat::where('name_type_street', 'ilike', '%' . $this->query . '%')
                ->get()
                ->toArray();
        }else{
            $this->type_streets = TypeStreet::where('name_type_street', 'ilike', '%' . $this->query . '%')
                ->get()
                ->toArray();
        }

    }

    public function selectItem($id, $value){
        $this->query = $value;
        $this->selectedId = $id;
        $this->selectedValue = $value;
        $this->closed = true;

        if($this->type == "country_street"){
            $this->emitUp('selectedCountryTypeStreat', $id);
        }else{
            $this->emitUp('selectedTypeStreat', $id);
        }
    }

    public function render()
    {
        return view('livewire.users.typestreet-select');

    }

}
