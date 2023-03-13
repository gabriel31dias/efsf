<?php

namespace App\Http\Livewire\Registry;

use App\Models\RegistryDate;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistryDateModalCreate extends Component
{
    use WithFileUploads; 

    public $modal = false;
    public $registry_id;
    public $document = null; 
    public $fieldsCreateDate = [
        'created_date' => null, 
        'closing_date' => null,
        'note' => '',
        'incorporated_date' => null,
        'unincorporated_date' => null,
        'collection_number' => null,
        'incorporated_registry_id' => null,
    ];
    public $ignore_number = [];

    public $listeners = ['selectedRegistry'];


    protected $rules = [
        'fieldsCreateDate.created_date' => 'required',
        'document.file' => 'mimes:pdf|max:2048'
    ];

    protected $messages = [ 
        "fieldsCreateDate.*.required" => "Campo obrigatório",
    ];

    public function render()
    {
        return view('livewire.registry.registry-date-modal-create');
    }

    public function selectedRegistry($value) { 
        $this->fieldsCreateDate['incorporated_registry_id'] = $value;
        $this->ignore_number = RegistryDate::where('incorporated_registry_id', $this->fieldsCreateDate['incorporated_registry_id'])
                                ->where('registry_id', $this->registry_id)
                                ->pluck('collection_number')->toArray();
    }

    public function saveRegistry(){
        
        $this->validate();
        $documents = $this->storeDocument();
        $this->fieldsCreateDate['documents'] = $documents;
        $this->fieldsCreateDate['registry_id'] = $this->registry_id;
        RegistryDate::firstOrCreate($this->fieldsCreateDate);
        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> "Data foi criada com sucesso."
        ]);
        $this->modal = false;
        $this->emit('refreshRegistryForm');
    }

    public function valideteCreate(){ 
        $this->clearRegistry();
        $exists_open_date = RegistryDate::where('registry_id', $this->registry_id)->whereNull('closing_date')->exists(); 
        if($exists_open_date){ 
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'error',
                'message'=> "Nao e possivel realizar o cadastro de uma nova data de abertura sem cadastrar a data de fechamento anterior."
            ]);
        } else { 
            $this->modal = true;
        }
 
    }

    public function storeDocument(){ 
        if(isset($this->document['file'])){ 
            $path = $this->document['file']->store('public');
            return json_encode([['path' => $path, 'description' => $this->document['description']]]);
        }
        return json_encode([]);
    }

    public function clearRegistry() { 
        $this->fieldsCreateDate = [
            'created_date' => null, 
            'closing_date' => null,
            'note' => '',
        ];
    }

}
