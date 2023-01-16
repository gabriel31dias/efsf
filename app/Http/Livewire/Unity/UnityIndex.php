<?php

namespace App\Http\Livewire\Unity;

use Livewire\Component;
use App\Models\Unit;
class UnityIndex extends Component
{
    public $perfilName;
    public $daysToAccessInspiration;
    public $daysToActivityLock;
    public $searchTerm = null;
    public $filterActives;
    public $filterInactives;

    public function render()
    {
        $units = $this->filtersCall();

        if($this->filterActives || $this->filterInactives){
            $units->where(function($query){
                if($this->filterActives){
                    $query->orWhere(['status' => true]);
                }

                if($this->filterInactives){
                    $query->orWhere(['status' => false]);
                }
            });
        }

        return view('livewire.unity.unity-index',
        [
            'units' => $units->paginate(5)
        ]);
    }

    public function filtersCall(){
        $searchTerm = "";

        if($this->searchTerm){
            $searchTerm = '%'. $this->searchTerm .'%';
            $units = Unit::where('name','ilike', '%'. $searchTerm .'%' );
        }

        if(!$searchTerm){
            $units = Unit::orderBy('id','desc');
        }

        return $units;
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
            'url'=> '/unit/'.$id.'/edit',
        ]);
    }
}
