<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class Userindex extends Component
{
    public $users;
    public function render()
    {
        return view('livewire.users.userindex');
    }

    public function addUser()
    {
        return redirect()->route('users.create');
    }
}
