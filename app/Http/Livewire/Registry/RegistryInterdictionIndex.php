<?php

namespace App\Http\Livewire\Registry;

use App\Models\RegistryInterdiction;
use Livewire\Component;

class RegistryInterdictionIndex extends Component
{
    public $searchTerm = null;

    public function render()
    {
        if($this->searchTerm){
            $searchTerm = '%'. $this->searchTerm .'%';
            $interdictions = RegistryInterdiction::whereHas('registry', function($q) use($searchTerm)
            {
                $q->where('name','ilike', '%'. $searchTerm .'%');
            });
        }else{
            $interdictions = RegistryInterdiction::orderBy('id','desc');
        }
        return view('livewire.registry.registry-interdiction-index',
        [
            'interdictions' => $interdictions->paginate(15)
        ]);
    }

    public function addInterdiction()
    {
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/registry-interdiction/create',
        ]);
    }

    public function clickUpdate($id){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/registry-interdiction/'.$id.'/edit',
        ]);
    }
}
