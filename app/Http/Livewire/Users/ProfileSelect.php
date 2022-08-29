<?php

namespace App\Http\Livewire\Users;

use App\Models\Profile;
use Livewire\Component;

class ProfileSelect extends Component
{
    public $query;
    public $perfil_name;
    public $profiles;
    public $selectedId;
    public $closed = false;
    public $highlightIndex;
    public $selectedValue;

    protected $listeners = ['curretProfile'];

    public function curretProfile(){
        $this->query = $this->perfil_name;
    }

    public function mount()
    {
        $this->reset1();
        $this->curretProfile();
    }

    public function reset1()
    {
        $this->query = '';

        $this->selectedId = '';
        $this->profiles = [];
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        $this->closed = false;
        if ($this->highlightIndex === count($this->contacts) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {

        $this->selectedId = '';
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->contacts) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $contact = $this->profiles[$this->highlightIndex] ?? null;
        if ($contact) {
            $this->redirect(route('show-contact', $contact['id']));
        }
    }

    public function updatedQuery()
    {
        $this->closed = false;
        $this->profiles = Profile::where('name_profile', 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function selectItem($id, $value){
        $this->query = $value;
        $this->selectedId = $id;
        $this->selectedValue = $value;
        $this->closed = true;
        $this->emitUp('selectedProfile', $id);
    }

    public function render()
    {
        return view('livewire.users.profile-select');

    }

}
