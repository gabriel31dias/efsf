<?php

namespace App\Http\Livewire\Process;

use App\Models\Process;
use Livewire\Component;

class ProcessIndex extends Component
{
    public $perfilName;
    public $daysToAccessInspiration;
    public $daysToActivityLock;
    public $searchTerm = null;
    public $filterActives;
    public $filterInactives;

    public function render()
    {
        $process = $this->filtersCall();

        if($this->filterActives || $this->filterInactives){
            $process->where(function($query){
                if($this->filterActives){
                    $query->orWhere(['status' => true]);
                }

                if($this->filterInactives){
                    $query->orWhere(['status' => false]);
                }
            });
        }

        return view('livewire.process.process-index',
        [
            'process' => $process->paginate(5)
        ]);
    }

    public function filtersCall(){
        $searchTerm = "";

        if($this->searchTerm){
            $searchTerm = '%'. $this->searchTerm .'%';
            $process = Process::where('name','ilike', '%'. $searchTerm .'%' );
        }

        if(!$searchTerm){
            $process = Process::orderBy('id','desc');
        }

        return $process;
    }

    public function mount(){
        $this->filterActives = true;
    }

    public function openFilters(){
        $this->dispatchBrowserEvent('openFilters', []);
    }



    public function addUnity()
    {
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/unit/create',
        ]);
    }

    public function clickUpdate($id){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/monitor/'.$id.'/edit',
        ]);
    }
}
