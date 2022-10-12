<?php

namespace App\Http\Livewire\Registry;

use App\Models\RegistryTransfer;
use Livewire\Component;

class RegistryTransferIndex extends Component
{
    public $searchTerm = null;

    public function render()
    {
        if($this->searchTerm){
            $searchTerm = '%'. $this->searchTerm .'%';
            $transfers = RegistryTransfer::whereHas('origin', function($q) use($searchTerm)
            {
                $q->where('name','ilike', '%'. $searchTerm .'%');
                $q->whereNull('deleted_at');
            });
        }else{
            $transfers = RegistryTransfer::whereHas('origin', function($q)
            {
                $q->whereNull('deleted_at');
            })->orderBy('id','desc');
        }
        return view('livewire.registry.registry-transfer-index',
        [
            'transfers' => $transfers->paginate(15)
        ]);
    }

    public function addTransfer()
    {
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/registry-transfer/create',
        ]);
    }

}
