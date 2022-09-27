<?php

namespace App\Http\Livewire\BlockedCertificate;

use App\Models\BlockedCertificate;
use App\Models\Registry;
use Livewire\Component;

class BlockedCertificateForm extends Component
{

    public $action;
    public $blockedCertificate;

    public $fields = [
        'registry_id' => '',
        'book_number' => '',
        'book_letter' => '',
        'sheet_number' => '',
        'sheet_side' => '',
        'registry_number' => '',
        'note' => '',
    ];

    protected $rules = [
        'fields.registry_id' => 'required',
        'fields.book_number' => 'required',
        'fields.book_letter' => 'required',
        'fields.sheet_number' => 'required',
        'fields.sheet_side' => 'required',
        'fields.registry_number' => 'required'
    ];

    protected $messages = [ 
        "fields.*.required" => "Campo obrigatório",
    ];

    public $listeners = ['selectedRegistry'];

    public function render()
    {
        return view('livewire.blocked-certificate.blocked-certificate-form');
    }

    public function mount()
    {
        if($this->blockedCertificate){
            $this->fields = $this->blockedCertificate->toArray();
        }
    }

    public function selectedRegistry($value) { 
        $this->fields['registry_id'] = $value;
    }

    public function saveRegistry(){
        
        $this->validate(); 

        if($this->action == "create"){ 
            $registry = Registry::findOrFail($this->fields['registry_id']);
            $blockedCertificate = $registry->blocked_certificates()->create($this->fields);
        } else { 
            $blockedCertificate = BlockedCertificate::updateOrCreate(['id' => $this->blockedCertificate->id ],$this->fields);
        }

        if($blockedCertificate){
            $this->messageSuccess();
            $this->dispatchBrowserEvent('redirect',[
                'url'=> '/blocked-certificate',
                'delay' => 1000
            ]);
        }
    }

    public function messageSuccess(){
        if($this->action == "create"){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Bloqueio criado com sucesso."
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Bloqueio foi atualizado com sucesso."
            ]);
        }
    }
}
