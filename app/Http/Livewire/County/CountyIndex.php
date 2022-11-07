<?php

namespace App\Http\Livewire\County;

use App\Models\County;
use Livewire\Component;

class CountyIndex extends Component
{
    public $searchTerm = null;

    public function render()
    {
        if($this->searchTerm){
            $searchTerm = '%'. $this->searchTerm .'%';
            $counties = County::where('name','ilike', '%'. $searchTerm .'%');
        }else{
            $counties = County::orderBy('name','asc');
        }

        return view('livewire.county.county-index',
        [
            'counties' => $counties->paginate(15)
        ]);
    }

    public function addCounty()
    {
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/county/create',
        ]);
    }

    public function clickUpdate($id){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/county/'.$id.'/edit',
        ]);
    }
}
