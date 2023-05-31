<?php

namespace App\Http\Livewire\Ballots;

use App\Models\Ballot;
use App\Models\BallotItem;

use App\Models\DirectorSignature;
use App\Models\User;
use Illuminate\Http\Request;

use Livewire\Component;
use App\Models\Unit;
use App\Models\ServiceStation;

class BallotsSearch extends Component
{
    public $perfilName;
    public $daysToAccessInspiration;
    public $daysToActivityLock;
    public $searchTerm = null;
    public $filterActives;
    public $filterInactives;

    public $type;
    public $typeBk;

    public $filterFaceA = false;

    public $filterFaceB = false;

    public $listeners = ['setSelectedItemToRearrange', 'selectDestino', 'selectOrigem', 'selectedServiceStation', 'selectedUser'];

    public $filters = [];


    public function selectedServiceStation($id)
    {
        $this->service_station = $id;
        $this->filters['service_station_id'] = ServiceStation::find($id)->id;
    }

    public function render(Request $request)
    {

        $this->type = $request->query('typeCreation');

        $items = $this->filtersCall();

        if ($this->type == '1') {
            $this->setType('cadastro-lote', $this->type);
        }


        if ($this->type == '2') {
            $this->setType('cadastro-avulso', $this->type);
        }

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

        return view('livewire.ballots.ballots-search',
        [
            'items' => $items->paginate(15)
        ]);
    }

    public function setType($xx, $type){
        $this->typeBk = $type;
    }

    public function setFilterFaceA($faceType){
        $this->filterFaceA = !$this->filterFaceA;
    }

    public function setFilterFaceB($faceType){
        $this->filterFaceB =  !$this->filterFaceB;

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

        if(!$searchTerm){
            $items = BallotItem::orderBy('id');
        }

        if (isset($this->filters['searchString'])) {
            $searchTerm = '%' . $this->filters['searchString'] . '%';
            $items = BallotItem::where(function ($query) use ($searchTerm) {
                $query->where('ballot_items.cod_ballot', 'ILIKE', $searchTerm);
            })
            ->leftJoin('service_stations', 'service_stations.id', '=', 'ballot_items.service_station_id');
        }

        if($this->typeBk == '1'   ||  $this->type == '1' ){
            $items->where('typeCreation', 1);
        }

        if($this->typeBk == '2'   ||  $this->type == '2' ){
            $items->where('typeCreation', 2);
        }

        if (isset($this->filters['service_station_id'])) {
            $items->where('service_station_id', $this->filters['service_station_id']);
        }

        if (isset($this->filters['status'])) {
            $items->where('situation', $this->filters['status']);
        }


        if (isset($this->filters['initInteval']) && $this->filters['initInteval']) {
            $items->where('cod_ballot', '>=', $this->filters['initInteval']);

            if (isset($this->filters['endInterval']) && $this->filters['endInterval']) {
               $items->where('cod_ballot', '<=', $this->filters['endInterval']);
            }

        } else {

            if (isset($this->filters['endInterval']) && $this->filters['endInterval']) {
               $items->where('cod_ballot', '<=', $this->filters['endInterval']);
            }

        }


        if (isset($this->filters['typeBallotCedule'])) {
            $items->where('face', $this->filters['typeBallotCedule']);
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
