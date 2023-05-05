<?php

namespace App\Http\Livewire\Print;

use App\Http\Controllers\PrintController;
use App\Models\Process;
use Livewire\Component;

class PrintIndex extends Component
{
    public $filter = [
        'startDate' => null, 
        'endDate' => null,
        'station_id' => null,
    ];

    protected $listeners = ['selectedServiceStation'];

    public $selected = [];

    public function render()
    {
        $filter = $this->filter;
        $items = Process::where(function ($query) use ($filter) { 
            if(!empty($filter['startDate'])){ 
                $query->where('created_at', '>=', $filter['startDate']);
            }
            if(!empty($filter['endDate'])){ 
                $query->where('created_at', '<=', $filter['endDate']);
            }
            if(!empty($filter['station_id'])){ 
                $query->where('service_station_id', '=', $filter['station_id']);
            }
        })
        ->where('situation', Process::RELEASED_FOR_PRINTING)->paginate(8);
        return view('livewire.print.print-index',['items' => $items]);
    }

    public function print(){
        if((empty($this->selected)) || ((count($this->selected) % 8) != 0)){ 
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'error',
                'message'=> 'O numero de processos selecionados deve ser multiplo de 8.'
            ]);
            return;
        }

        $processes = Process::whereIn('id', array_keys($this->selected))->get();
        $retorno = PrintController::printFaceB($processes);
        return response()->streamDownload(function() use ($retorno) {
            echo $retorno;
        }, 'my-pdf-file.pdf');
    }

    public function select($id){ 
        if(!isset($this->selected[$id]) || $this->selected[$id] == false){ 
            $this->selected[$id] = true;
        }else { 
            unset($this->selected[$id]);
        }
    }

    public function selectedServiceStation($id){ 
        $this->filter['station_id'] = $id;
    }
}
