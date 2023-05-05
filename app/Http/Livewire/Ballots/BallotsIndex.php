<?php

namespace App\Http\Livewire\Ballots;

use App\Models\Ballot;
use App\Models\DirectorSignature;
use App\Models\User;
use Illuminate\Http\Request;

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

    public $type;

    public function render(Request $request)
    {
        $items = $this->filtersCall();

        $this->type = $request->query('typeCreation');

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
            'items' => $items->where('typeCreation', $this->type)->paginate(5)
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

        if ($this->searchTerm) {
            $searchTerm = '%'. $this->searchTerm .'%';
            $items = Ballot::where('face', 'ILIKE', $searchTerm)
                           ->orWhere('created_at', 'LIKE', $searchTerm)
                           ->join('service_stations', 'service_stations.id', '=', 'ballots.service_station_id')
                           ->where('service_stations.service_station_name', 'LIKE', $searchTerm);


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
            'url'=> '/ballots/create?typeCreation='.$this->type,
        ]);
    }

    public function clickUpdate($id){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/ballots/'.$id.'/edit',
        ]);
    }
}
