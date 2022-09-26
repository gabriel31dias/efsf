<?php

namespace App\Http\Livewire\BlockedCertificate;

use App\Models\BlockedCertificate;
use Livewire\Component;

class BlockedCertificateIndex extends Component
{

    public $searchTerm = null;

    public function render()
    {
        if($this->searchTerm){
            $searchTerm = '%'. $this->searchTerm .'%';
            $blockedCertificates = BlockedCertificate::whereHas('registry', function($q) use($searchTerm)
            {
                $q->where('name','ilike', '%'. $searchTerm .'%');
                $q->whereNull('deleted_at');
            });
        }else{
            $blockedCertificates = BlockedCertificate::whereHas('registry', function($q)
            {
                $q->whereNull('deleted_at');

            })->orderBy('id','desc');
        }
        return view('livewire.blocked-certificate.blocked-certificate-index',
        [
            'blockedCertificates' => $blockedCertificates->paginate(15)
        ]);
    }

    public function addBlockedCertificate()
    {
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/blocked-certificate/create',
        ]);
    }

    public function clickUpdate($id){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/blocked-certificate/'.$id.'/edit',
        ]);
    }

}
