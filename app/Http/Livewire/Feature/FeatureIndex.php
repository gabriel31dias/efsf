<?php

namespace App\Http\Livewire\Feature;

use App\Models\Feature;
use Livewire\Component;

class FeatureIndex extends Component
{
    public $searchTerm = null;

    public function render()
    {
        if($this->searchTerm){
            $searchTerm = '%'. $this->searchTerm .'%';
            $features = Feature::where('name','ilike', '%'. $searchTerm .'%');
        }else{
            $features = Feature::orderBy('id','desc');
        }

        return view('livewire.feature.feature-index',
        [
            'features' => $features->paginate(15)
        ]);
    }

    public function addFeature()
    {
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/feature/create',
        ]);
    }

    public function clickUpdate($id){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/feature/'.$id.'/edit',
        ]);
    }
}
