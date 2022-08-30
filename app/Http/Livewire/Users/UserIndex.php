<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
class UserIndex extends Component
{

    public $searchTerm = null;

    public function render()
    {

        if($this->searchTerm){
            $searchTerm = '%'. $this->searchTerm .'%';
            $users = User::where('name','ilike', '%'. $searchTerm .'%' )->paginate(15);
        }else{
            $users = User::orderBy('id','desc')->paginate(15);
        }

        return view('livewire.users.userindex',
        [
            'users' => $users
        ]);
    }

    public function openFilters(){
        $this->dispatchBrowserEvent('openFilters', []);
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
