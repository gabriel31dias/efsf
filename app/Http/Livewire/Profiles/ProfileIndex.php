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
    public $filterActives;
    public $filterInactives;

    public function render()
    {
        $profiles = $this->filtersCall();

        if($this->filterActives || $this->filterInactives){
            $profiles->where(function($query){
                if($this->filterActives){
                    $query->orWhere(['status' => true]);
                }

                if($this->filterInactives){
                    $query->orWhere(['status' => false]);
                }
            });
        }

        return view('livewire.profiles.profile-index',
        [
            'profiles' => $profiles->paginate(15)
        ]);
    }

    public function filtersCall(){
        $searchTerm = "";

        if($this->perfilName){
            $searchTerm = '%'. $this->perfilName .'%';
            $profiles = Profile::where('name_profile','ilike', '%'. $searchTerm .'%' );
        }

        if($this->daysToAccessInspiration){
            $searchTerm = '%'. $this->daysToAccessInspiration .'%';
            $profiles = Profile::where('name_profile','ilike', '%'. $searchTerm .'%' );
        }

        if($this->daysToActivityLock){
            $searchTerm = '%'. $this->daysToActivityLock .'%';
            $profiles = Profile::where('name_profile','ilike', '%'. $searchTerm .'%' );
        }

        if(!$searchTerm){
            $profiles = Profile::orderBy('id','desc');
        }

        return $profiles;
    }

    public function mount(){
        $this->filterActives = true;
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
