<?php

namespace App\Http\Livewire\Users;

use App\Models\Profile;
use Livewire\Component;

class Profileselect extends Component
{
    public $query;
    public $profiles;
    public $selectedId;
    public $closed = false;
    public $highlightIndex;
    public $selectedValue;

    public function mount()
    {
        $this->reset1();
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
    }

    public function render()
    {
        return view('livewire.users.profile-select');

    }

}
