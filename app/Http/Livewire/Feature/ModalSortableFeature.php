<?php

namespace App\Http\Livewire\Feature;

use App\Models\Feature;
use Livewire\Component;

class ModalSortableFeature extends Component
{

    public $features;
    public $tmpOrder;
    public $modal = false;

    public function saveOrder()
    {
        Feature::upsert($this->features, ['id'], ['order']);
        $this->features = Feature::select('id', 'order', 'name')->orderBy('order','asc')->get()->toArray();
        $this->modal = false;
        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> "Ordem atualizada com sucesso! "
        ]);
    }

    public function mount(){ 
        $this->features = Feature::select('id', 'order', 'name')->orderBy('order','asc')->get()->toArray();
    }

    public function render()
    {
        $this->tmpOrder = $this->features;
        return view('livewire.feature.modal-sortable-feature');
    }

    public function changeOrder($feature, $value)
    {

        $oldValueTarget = array_filter($this->tmpOrder, function($busca) use ($value) {
            return $busca['order'] == $value;
        });
        $oldValueKey = array_key_first($oldValueTarget);

        $this->features[$feature]['order'] = $value;
        $this->features[$oldValueKey]['order'] = $this->tmpOrder[$feature]['order'];
        array_multisort(array_column($this->features, 'order'), SORT_ASC, $this->features);
    }
}
