<?php

namespace App\Http\Livewire\GenresSelect;

use App\Models\Genre;
use Livewire\Component;


class GenresSelect extends Component
{
    public $query;
    public $maritalStatus;
    public $selectedId;
    public $closed = false;
    public $highlightIndex;
    public $selectedValue;
    public $genres = [];
    public $genre;

    public $genre_name;

    protected $listeners = ['clearServiceStationField', 'setGenre'];

    public function mount()
    {
        $this->reset1();
        $this->currentGenre();
    }

    public function currentGenre(){
        $this->query = $this->genre;
    }


    public function setGenre($genre){
        if($genre) $this->selectItem($genre['id'], $genre['name']);
    }

    public function reset1()
    {
        $this->query = '';
        $this->selectedId = '';
        $this->maritalStatus = [];
        $this->highlightIndex = 0;
    }

    public function clearServiceStationField(){
        $this->query = null;
    }

    public function incrementHighlight()
    {
        $this->closed = false;
        if ($this->highlightIndex === count($this->genres) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {

        $this->selectedId = '';
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->genres) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $genre = $this->genres[$this->highlightIndex] ?? null;
        if($genre){
            $this->selectItem($genre['id'], $genre['name']);
        }
    }

    public function updatedQuery()
    {
        $this->closed = false;
        $this->genres = Genre::where('name', 'ilike', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function selectItem($id, $value){

        $this->query = $value;
        $this->selectedId = $id;
        $this->selectedValue = $value;
        $this->closed = true;
        $this->emitUp('selectedGenre', [$id, $value]);
    }


    public function render()
    {
        return view('livewire.genresSelect.genders-index');
    }

}
