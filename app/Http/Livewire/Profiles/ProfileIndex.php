<?php

namespace App\Http\Livewire\Profiles;

use Livewire\Component;
use App\Models\Profile;
class ProfileIndex extends Component
{
    public $perfilName;
    public $daysToAccessInspiration;
    public $daysToActivityLock;
    public $searchTerm = null;
    public function render()
    {

        $searchTerm = "";
        if($this->searchTerm){
            $searchTerm = '%'. $this->searchTerm .'%';
            $profiles = Profile::where('name_profile','ilike', '%'. $searchTerm .'%' )->paginate(15);
        }else{
            $profiles = Profile::orderBy('id','desc')->paginate(15);
        }

        if($this->perfilName){
            $searchTerm = '%'. $this->perfilName .'%';
            $profiles = Profile::where('name_profile','ilike', '%'. $searchTerm .'%' )->paginate(15);
        }

        if($this->daysToAccessInspiration){
            $searchTerm = '%'. $this->daysToAccessInspiration .'%';
            $profiles = Profile::where('name_profile','ilike', '%'. $searchTerm .'%' )->paginate(15);
        }

        if($this->daysToActivityLock){
            $searchTerm = '%'. $this->daysToActivityLock .'%';
            $profiles = Profile::where('name_profile','ilike', '%'. $searchTerm .'%' )->paginate(15);
        }

        if(!$searchTerm){
            $profiles = Profile::orderBy('id','desc')->paginate(15);
        }

        return view('livewire.profiles.profile-index',
        [
            'profiles' => $profiles
        ]);
    }

    public function openFilters(){
        $this->dispatchBrowserEvent('openFilters', []);
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
