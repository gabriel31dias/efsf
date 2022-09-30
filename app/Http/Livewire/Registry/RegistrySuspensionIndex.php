<?php

namespace App\Http\Livewire\Registry;

use App\Models\RegistrySuspension;
use Livewire\Component;

class RegistrySuspensionIndex extends Component
{
    public $searchTerm = null;

    public function render()
    {
        if($this->searchTerm){
            $searchTerm = '%'. $this->searchTerm .'%';
            $suspensions = RegistrySuspension::whereHas('registry', function($q) use($searchTerm)
            {
                $q->where('name','ilike', '%'. $searchTerm .'%');
                $q->whereNull('deleted_at');

            });
        }else{
            $suspensions = RegistrySuspension::whereHas('registry', function($q)
            {
                $q->whereNull('deleted_at');

            })->orderBy('id','desc');
        }
        return view('livewire.registry.registry-suspension-index',
        [
            'suspensions' => $suspensions->paginate(15)
        ]);
    }

    public function addSuspension()
    {
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/registry-suspension/create',
        ]);
    }

    public function clickUpdate($id){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/registry-suspension/'.$id.'/edit',
        ]);
    }
}
