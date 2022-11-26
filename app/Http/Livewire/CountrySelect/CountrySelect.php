<?php

namespace App\Http\Livewire\CountrySelect;

use App\Models\Country;
use Livewire\Component;


class CountrySelect extends Component
{
    public $query;
    public $maritalStatus;
    public $selectedId;
    public $closed = false;
    public $highlightIndex;
    public $selectedValue;
    public $countries = [];
    public $country;

    protected $listeners = ['clearServiceStationField', 'setCountry'];

    public function setCountry($country){
        $this->query = $country;
    }

    public function currentCounty()
    {
        $this->query = $this->country;
    }


    public function mount()
    {
        $this->reset1();

        $this->currentCounty();
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
        if ($this->highlightIndex === count($this->countries) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {

        $this->selectedId = '';
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->countries) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectCountry()
    {
        $country = $this->countries[$this->highlightIndex] ?? null;
        if($country){
            $this->selectItem($country['id'], $country['name']);
        }
    }

    public function updatedQuery()
    {
        $this->closed = false;
        $this->countries = Country::where('name', 'ilike', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function selectItem($id, $value){

        $this->query = $value;
        $this->selectedId = $id;
        $this->selectedValue = $value;
        $this->closed = true;
        $this->emitUp('selectedCountry', [$value, $id]);
    }


    public function render()
    {
        return view('livewire.countrySelect.country-index');
    }

}
