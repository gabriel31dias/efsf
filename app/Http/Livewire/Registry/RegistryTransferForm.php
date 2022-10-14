<?php

namespace App\Http\Livewire\Registry;

use App\Exports\CitizenConflictExport;
use App\Models\Citizen;
use App\Models\Registry;
use App\Models\RegistryTransfer;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class RegistryTransferForm extends Component
{
    public $action;
    public $registryTransfer;
    public $citizenConflict;

    public $fields = [
        'registry_origin_id' => '',
        'registry_destination_id' => '',
    ];

    protected $rules = [
        'fields.registry_origin_id' => 'required',
        'fields.registry_destination_id' => 'required',
    ];

    protected $messages = [ 
        "fields.*.required" => "Campo obrigatório",
    ];

    public $listeners = ['selectedRegistry', 'selectedDestination'];

    public function render()
    {
        return view('livewire.registry.registry-transfer-form');
    }

    public function mount()
    {
        if($this->registryTransfer){
            $this->fields = $this->registryTransfer->toArray();
        }
        $this->citizenConflict = new Collection([]);
    }

    public function selectedRegistry($value) { 
        $this->fields['registry_origin_id'] = $value;
    }

    public function selectedDestination($value) { 
        $this->fields['registry_destination_id'] = $value;
    }

    public function save(){
        
        $this->validate(); 

        if($this->action == "create"){ 
            //ADICIONAR TRANSACAO DEPOIS
            $registrySuspension = RegistryTransfer::create($this->fields);

            //BUSCAR SEMELHANTES
            $citizens = Citizen::where('registry_id', $this->fields['registry_origin_id'])->get();
            if(count($citizens)) { 

                $whereIn = [];
                foreach($citizens as $citizen) { 
                    $whereIn['rg'][] = $citizen->rg;
                    $whereIn['cpf'][] = $citizen->cpf;
                    $whereIn['name'][] = $citizen->name;
                    $whereIn['matriculation'][] = $citizen->matriculation;
                }
                
                $this->citizenConflict = Citizen::where('registry_id', '<>', $this->fields['registry_origin_id'])
                                        ->where(function ($query) use($whereIn) { 
                                            $query->orWhereIn('rg', $whereIn['rg']);
                                            $query->orWhereIn('cpf', $whereIn['cpf']);
                                            $query->orWhereIn('name', $whereIn['name']);
                                            $query->orWhereIn('matriculation', $whereIn['matriculation']);
                                        })->get();

            }


            //MASS UPDATE
            Citizen::where('registry_id', $this->fields['registry_origin_id'])
                ->update(['registry_id' => $this->fields['registry_destination_id']]);
        } 
        
        if($registrySuspension){
            $this->messageSuccess();
            if(!count($this->citizenConflict)){ 
                $this->dispatchBrowserEvent('redirect',[
                    'url'=> '/registry-transfer',
                    'delay' => 1000
                ]);
            }
        }
    }

    public function messageSuccess(){
        if($this->action == "create"){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Transferência criado com sucesso."
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Transferência foi atualizado com sucesso."
            ]);
        }
    }

    public function donwloadCitizenConflict()
    {
        return Excel::download(new CitizenConflictExport($this->citizenConflict), 'users.xlsx');
    }
}
