<?php

namespace App\Http\Livewire\Profiles;

use Livewire\Component;
use App\Models\Profile;
class ProfileIndex extends Component
{

    public function render()
    {
        return view('livewire.profiles.profile-index',
        [
            'profiles' => Profile::orderBy('id','desc')->paginate(15)
        ]);
    }

    public function addUser()
    {
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/profile/create',
        ]);
    }

    public function clickUpdate($id){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/profile/'.$id.'/edit',
        ]);
    }
}
