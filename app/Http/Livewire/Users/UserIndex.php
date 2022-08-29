<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
class UserIndex extends Component
{

    public function render()
    {
        return view('livewire.users.userindex',
        [
            'users' => User::orderBy('id','desc')->paginate(15)
        ]);
    }

    public function addUser()
    {
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/users/create',
        ]);
    }

    public function clickUpdate($id){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/users/'.$id.'/edit',
        ]);
    }
}
