<?php

namespace App\Http\Livewire\ServiceStation;

use App\Models\ServiceStation;
use Livewire\Component;

class ServiceStationIndex extends Component
{
    public $searchTerm = null;
    public $filterActives;
    public $filterInactives;



    public function render()
    {

        if($this->searchTerm){
            $searchTerm = '%'. $this->searchTerm .'%';
            $stations = ServiceStation::where('service_station_name','ilike', '%'. $searchTerm .'%' );
        }else{
            $stations = ServiceStation::orderBy('id','desc');
        }

        if($this->filterActives || $this->filterInactives){
            $stations->where(function($query){
                if($this->filterActives){
                    $query->orWhere(['status' => true]);
                }

                if($this->filterInactives){
                    $query->orWhere(['status' => false]);
                }
            });
        }



        return view('livewire.serviceStation.service-station-index',
        [
            'stations' => $stations->paginate(15)
        ]);
    }

    public function openFilters(){
        $this->dispatchBrowserEvent('openFilters', []);
    }

    public function addStation()
    {
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/service-station/create',
        ]);
    }

    public function clickUpdate($id){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/service-station/'.$id.'/edit',
        ]);
    }
}
