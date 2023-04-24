<?php

namespace App\Http\Livewire\Ballots;

use App\Models\Ballot;
use App\Models\DirectorSignature;
use App\Models\User;
use Livewire\Component;
use App\Models\Unit;
class BallotsIndex extends Component
{
    public $perfilName;
    public $daysToAccessInspiration;
    public $daysToActivityLock;
    public $searchTerm = null;
    public $filterActives;
    public $filterInactives;

    public function render()
    {
        $items = $this->filtersCall();



        if($this->filterActives || $this->filterInactives){
            $items->where(function($query){
                if($this->filterActives){
                    //$query->orWhere(['status' => true]);
                }

                if($this->filterInactives){
                    //$query->orWhere(['status' => false]);
                }
            });
        }

        return view('livewire.ballots.ballots-index',
        [
            'items' => $items->paginate(5)
        ]);
    }


    public function destroyDirectorSignature($idDirectorSignature) {
        $directorSig = DirectorSignature::find($idDirectorSignature);

        ##if(isset($linkedUsers->id)){
          ##  $this->dispatchBrowserEvent('alert',[
         ##       'type'=> 'error',
           ##     'message'=> "Registro não pode ser excluído, existem usuários vinculados a essa unidade"
            ##]);

           ## return false;
        ##}

        if(isset($directorSig->id)){
            $directorSig->delete();
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Item excluido com sucesso."
            ]);
        }
    }

    public function disableDirectorSignature($idDirectorSignature) {
        $directorSig = DirectorSignature::find($idDirectorSignature);



        ##if(isset($linkedUsers->id)){
          ##  $this->dispatchBrowserEvent('alert',[
         ##       'type'=> 'error',
           ##     'message'=> "Registro não pode ser excluído, existem usuários vinculados a essa unidade"
            ##]);

           ## return false;
        ##}



        if(isset($directorSig->id)){
            $directorSig->update([
                'active' => false,
                "date_inactive" => now()
            ]);
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Item excluido com sucesso."
            ]);
        }



    }

    public function enableDirectorSignature($idDirectorSignature) {
        $directorSig = DirectorSignature::find($idDirectorSignature);

        ##if(isset($linkedUsers->id)){
          ##  $this->dispatchBrowserEvent('alert',[
         ##       'type'=> 'error',
           ##     'message'=> "Registro não pode ser excluído, existem usuários vinculados a essa unidade"
            ##]);

           ## return false;
        ##}



        DirectorSignature::query()->update(['active' => false]);


        if(isset($directorSig->id)){
            $directorSig->update([
                'active' => true,
                "date_inactive" => now()
            ]);
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Item excluido com sucesso."
            ]);
        }
    }

    public function filtersCall(){
        $searchTerm = "";

        if($this->searchTerm){
            $searchTerm = '%'. $this->searchTerm .'%';
            //$items = Ballot::where('name','ilike', '%'. $searchTerm .'%' );
        }



        if(!$searchTerm){
            $items = Ballot::orderBy('id');

        }

        return $items;
    }

    public function mount(){
        $this->filterActives = true;
    }

    public function openFilters(){
        $this->dispatchBrowserEvent('openFilters', []);
    }

    public function create()
    {
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/ballots/create',
        ]);
    }

    public function clickUpdate($id){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/ballots/'.$id.'/edit',
        ]);
    }
}
