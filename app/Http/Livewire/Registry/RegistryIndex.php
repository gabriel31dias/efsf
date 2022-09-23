<?php

namespace App\Http\Livewire\Registry;

use App\Models\Registry;
use Livewire\Component;

class RegistryIndex extends Component
{
    public $searchTerm = null;

    public function render()
    {
        if($this->searchTerm){
            $searchTerm = '%'. $this->searchTerm .'%';
            $registries = Registry::where('name','ilike', '%'. $searchTerm .'%')->orWhere('sic_code','ilike', '%'. $searchTerm .'%' );
        }else{
            $registries = Registry::orderBy('id','desc');
        }

        return view('livewire.registry.registry-index',
        [
            'registries' => $registries->paginate(15)
        ]);
    }

    public function addRegistry()
    {
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/registry/create',
        ]);
    }

    public function clickUpdate($id){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/registry/'.$id.'/edit',
        ]);
    }
}
