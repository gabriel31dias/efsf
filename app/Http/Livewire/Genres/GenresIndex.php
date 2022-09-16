<?php

namespace App\Http\Livewire\Genres;

use Livewire\Component;
use App\Models\Genre;
class GenresIndex extends Component
{
    public $perfilName;
    public $daysToAccessInspiration;
    public $daysToActivityLock;
    public $searchTerm = null;
    public $filterActives;
    public $filterInactives;

    public function render()
    {
        $genres = $this->filtersCall();



        return view('livewire.genres.genres-index',
        [
            'genres' => $genres->paginate(5)
        ]);
    }

    public function filtersCall(){
        $searchTerm = "";

        $genres = Genre::orderBy('id','desc');
        return $genres;
    }

    public function mount(){
        $this->filterActives = true;
    }

    public function openFilters(){
        $this->dispatchBrowserEvent('openFilters', []);
    }

    public function addGender()
    {
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/genres/create',
        ]);
    }

    public function clickUpdate($id){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/genres/'.$id.'/edit',
        ]);
    }
}
