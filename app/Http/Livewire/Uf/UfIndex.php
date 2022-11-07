<?php

namespace App\Http\Livewire\Uf;

use App\Models\Uf;
use Livewire\Component;

class UfIndex extends Component
{
    public $searchTerm = null;

    public function render()
    {
        if($this->searchTerm){
            $searchTerm = '%'. $this->searchTerm .'%';
            $ufs = Uf::where('name','ilike', '%'. $searchTerm .'%');
        }else{
            $ufs = Uf::orderBy('name','asc');
        }

        return view('livewire.uf.uf-index',
        [
            'ufs' => $ufs->paginate(15)
        ]);
    }

    public function addUf()
    {
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/uf/create',
        ]);
    }

    public function clickUpdate($id){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/uf/'.$id.'/edit',
        ]);
    }
}
