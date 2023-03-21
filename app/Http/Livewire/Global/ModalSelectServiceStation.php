<?php

namespace App\Http\Livewire\Global;

use App\Models\ServiceStation;
use Livewire\Component;

class ModalSelectServiceStation extends Component
{

    public $serviceStation; 
    public $tmpServiceStation; 
    public $modal = false; 

    protected $listeners = ['selectedServiceStation', 'openSelectServiceStationModal'];

    public function mount(){ 
        $this->serviceStation = session('service_station');
        if(!isset($this->serviceStation)){ 
            $service_stations = ServiceStation::whereIn('id', auth()->user()->userStations->pluck('service_station_id')->toArray())->get();
            if(count($service_stations) > 1){ 
                $this->modal = true;
            } else { 
                session()->put('service_station', $service_stations[0]);
            }

        }
    }

    public function render()
    {
        return view('livewire.global.modal-select-service-station');
    }

    public function changeServiceStationSession(){ 
        $serviceStation = ServiceStation::findOrFail($this->tmpServiceStation);
        $this->serviceStation = $serviceStation;
        session()->put('service_station', $serviceStation);
        $this->modal = false;
        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> "Posto de Atendimento alterado com sucesso! "
        ]);
    }

    public function selectedServiceStation($service_station_id){ 
        $this->tmpServiceStation = $service_station_id;
    }
    


}
