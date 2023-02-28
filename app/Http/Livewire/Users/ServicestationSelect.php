<?php

namespace App\Http\Livewire\Users;

use App\Models\ServiceStation;
use Livewire\Component;

class ServicestationSelect extends Component
{
    public $query;
    public $stations;
    public $station;
    public $selectedId;
    public $closed = false;
    public $highlightIndex;
    public $selectedValue;
    public $servicesPoints = [];

    public $defaultValue;

    protected $listeners = ['clearServiceStationField', 'setServiceStation'];

    public function mount()
    {
        $this->reset1();
        $this->currentServiceStation();
        if(isset($this->defaultValue)) $this->selectItem($this->defaultValue->id, $this->defaultValue->service_station_name);
    }

    public function currentServiceStation(){
       $this->query = $this->station;
    }

    public function setServiceStation($value){
        $this->query = $value;
    }

    public function reset1()
    {
        $this->query = '';

        $this->selectedId = '';
        $this->profiles = [];
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
        $station = $this->stations[$this->highlightIndex] ?? null;

        if ($station) {
            $this->selectItem($station['id'], $station['service_station_name']);
        }
    }

    public function updatedQuery()
    {
        $this->closed = false;
        $this->stations = ServiceStation::where('service_station_name', 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }


    public function selectItem($id, $value){

        $this->query = $value;
        $this->selectedId = $id;
        $this->selectedValue = $value;
        $this->closed = true;
        $this->emitUp('selectedServiceStation', $id);
    }


    public function render()
    {
        return view('livewire.users.services-station-select');
    }

}
