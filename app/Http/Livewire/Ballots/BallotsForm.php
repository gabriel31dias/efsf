<?php

namespace App\Http\Livewire\Ballots;

use App\Http\Repositories\UnityRepository;
use App\Models\Ballot;
use App\Models\BallotItem;
use App\Models\DirectorSignature;

use App\Models\ServiceStation;
use App\Models\User;
use Livewire\Component;
use App\Models\Unit;
use App\Models\Profession;
use Livewire\WithFileUploads;


use App\Http\Repositories\ProfileRepository;
class BallotsForm extends Component
{

    use WithFileUploads;
    public $errorsKeys = [];
    public $errors = [];

    public $currentEditValue = "";
    public $functions = [];
    public $textFunction = "";

    public $cpf;

    public $arrErros = [];

    public $rowEdit = "";

    public $fileSign = "";

    public $selectedTab = "";

    public $service_station = "";

    public $ballots;

    public $perfilName;
    public $daysToAccessInspiration;
    public $daysToActivityLock;
    public $obrigatory_filds = [
        "user_id",
        "loose_banknotes"
    ];
    public $unit;
    public $action;

    public $fields = [
        "inicial" => "",
        "final" => ""
    ];

    public $blockedTypeRegister = false;


    public $attachmentType;
    public $user;
    public $file;

    public $attachments = [];
    public $oldAttachments = [];

    public $typeFiles = [ "1" => "OFÍCIO", "2" => "MEMORANDO", "3" => "REQUERIMENTO"];

    public $user_name;

    public $listeners = ['selectedServiceStation', 'selectedUser'];

    public function render()
    {
        return view('livewire.ballots.ballots-form');
    }

    public function selectedServiceStation($id){
        $this->service_station = $id;
        $this->fields['service_station_id'] = ServiceStation::find($id)->id;
    }

    public function setSelectedTab($tab){
        $this->selectedTab = $tab;
        $this->dispatchBrowserEvent('selectedTab',[
            'tab'=> $tab
        ]);

        $this->dispatchBrowserEvent('reload-masks');
    }


    public function selectedUser($id){
        $this->user = $id;
        $this->user_name = User::find($id)->name;
        $this->getAllFunctions(User::find($id));
    }

    public function getAllFunctions($user){
        $user = User::find($user->id);
        $this->functions = Profession::where(['unit_id' =>  $user->unit_id])->get() ?? [];
        $this->cpf = $user->cpf ?? null;
        $this->unit = Unit::find($user->unit_id)->name ?? null;
        $this->fields['user_id'] = $user->id ?? null;
        $this->fields['unit_id'] = Unit::find($user->unit_id)->id ?? null;
    }

    public function addNewFile(){
        $this->attachments[] = ['type' => $this->attachmentType, 'file' => $this->file ];
        $this->attachmentType = null;
        $this->file = null;
    }


    public function download($item){

        $this->dispatchBrowserEvent('redirect',[
            'url'=> $item->url,
            'delay' => 1000
        ]);
    }


    public function saveNewValue($item, $unit_id){
        $index = array_search($item, $this->functions);

        $this->functions[$index] = $this->currentEditValue;
        $backup = $this->currentEditValue;
        $this->currentEditValue = "";

        if($unit_id == null){
            return false;
        }


        $directorSignature = DirectorSignature::where(['unit_id' => $unit_id])->where(['name' => $item])->first();
        if(isset($profission->id)){
            $directorSignature->update(["name" => $backup]);
        }

        $this->rowEdit = "";

        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> "Item atualizado com sucesso."
        ]);
    }

    public function destroyItemFile($index){



        unset($this->attachments[$index]);


    }

    function getNewAttachments() {
        $newItems = array();
        foreach ($this->attachments as $attachment) {
            $found = false;
            foreach ($this->oldAttachments as $oldAttachment) {
                if ($oldAttachment['file'] == $attachment['file']) {
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $newItems[] = $attachment;
            }
        }
        return $newItems;
    }

    public function mount()
    {

        if($this->ballots){

            $this->service_station = ServiceStation::where('id', $this->ballots->service_station_id)->first();

            $this->blockedTypeRegister = true;

            if($this->ballots->typeCreation == 1){
                $this->selectedTab  = 'cadastro-lote';
            }


            if($this->ballots->typeCreation == 2){
                $this->selectedTab = 'cadastro-avulso';
                $this->fields['stringBallots'] =  $this->ballots->stringBallots;
            }

            $data = json_decode($this->ballots->stringBallotsErrors , true);

            $newArray = array();
            foreach ($data as $item) {
                $newArray[] = array('type' => $item['type'], 'code' => $item['code']);
            }

            $this->arrErros = $newArray;

            $this->fields['initial'] = $this->ballots->initial;
            $this->fields['final'] = $this->ballots->final;
        }else{
            $this->service_station = null;
        }




    }

    public function setEditingRow($item){
        $this->rowEdit = $item;
    }

    public function createOrUpdateFunctions($unit_id){
        foreach($this->functions as $item){
            $directorSignature = DirectorSignature::where(['unit_id' => $unit_id])->where(['name' => $item ])->first();
            if(isset($directorSignature->id)){

            }else{
                DirectorSignature::create([
                    'name' => $item,
                    'unit_id' => $unit_id
                ]);
            }
        }
    }

    public function destroy_unit($profession, $unit_id)
    {
        $index = array_search($profession, $this->functions);
        unset($this->functions[$index]);

        if (empty($profession) || empty($unit_id)) {
            return false;
        }

        $signature = DirectorSignature::where('unit_id', $unit_id)
                                   ->where('name', $profession)
                                   ->first();
        if ($signature) {
            $signature->delete();
        }


        $message = 'Item excluído com sucesso.';
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => $message,
        ]);

        return true;
    }

    public function goUnit(){
        $this->dispatchBrowserEvent('redirect',[
            'url'=> '/unit/'.$this->fields['unit_id'] .'/edit',
        ]);
    }

    public function storeOtherAttachments(){
        $newAttachments = $this->getNewAttachments();
        $filesAtachments = [];

        foreach($newAttachments as $item) {
            $file = $item['file']->store('public/signatures-other-attachments');
            //array_push($this->attachments, ['type' => $this->typeFiles[$item['type']] ?? $item['type'], 'file' => $file]);
        }


        return \json_encode($this->attachments);
    }


    public function saveLot(){
        $batchCodes = $this->getBatchCodes($this->fields['initial'], $this->fields['final']);

        $this->creatBallotItems($batchCodes);

        $error = false;

        if(count($this->arrErros) > 0) {
            $error = true;
        }

        if (count($batchCodes) == count($this->arrErros)) {
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'error',
                'message'=> "Não foi possivel salvar as cédulas, verifique os problema abaixo e tente novamente"
            ]);
            return false;
        }

        $result = Ballot::create([
            'stringBallots' => $this->fields['initial']."...".$this->fields['final'],
            'user_id' => auth()->user()->id,
            'error' => $error,
            'service_station_id' => $this->fields['service_station_id'],
            'stringBallotsErrors' => \json_encode($this->arrErros),
            'initial' => $this->fields['initial'],
            'final' => $this->fields['final'],
            'typeCreation' => 1
        ]);

        if($result){
            if(count($this->arrErros) <= 0) {
                $this->dispatchBrowserEvent('alert',[
                    'type'=> 'success',
                    'message'=> "Cédulas salvas com sucesso"
                ]);
                $this->dispatchBrowserEvent('redirect', [
                    'url' => '/ballots',
                    'delay' => 1000
                ]);
            }else{
                $this->dispatchBrowserEvent('alert',[
                    'type'=> 'warning',
                    'message'=> "Algumas cédulas não foram registradas pois já existe no sistema."
                ]);
            }
        }
    }

    public function creatBallotItems($codes){
        $arrErros = [];
        foreach ($codes as $code) {
            $batch = BallotItem::where('cod_ballot', $code)->first();
            if ($batch == null) {
                BallotItem::create([
                    'cod_ballot' => $code,
                    'user_id' => auth()->user()->id,
                    'situation' => 'A',
                    'service_station_id' => $this->fields['service_station_id'],
                    'typeCreation' => 1
                ]);
            } else {
                array_push($arrErros, ['type' => 'Está cédula já existe registrada.', 'code' => $code]);
            }
        }

        if(count($arrErros) > 0){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'error',
                'message'=> "Algumas cédulas não foram registradas pois já existe no sistema."
            ]);
        }

        $this->arrErros = $arrErros;
    }



    public function saveAvulso(){
        $batchCodes = explode(",", $this->fields['loose_banknotes']);

        $this->creatAvulsoItems($batchCodes);

        $error = false;

        if(count($this->arrErros) > 0) {
            $error = true;
        }

        if (count($batchCodes) == count($this->arrErros)) {
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'error',
                'message'=> "Não foi possivel salvar as cédulas, verifique os problema abaixo e tente novamente"
            ]);
            return false;
        }

        $result = Ballot::create([
            'stringBallots' => $this->fields['loose_banknotes'] ,
            'user_id' => auth()->user()->id,
            'error' => $error,
            'service_station_id' => $this->fields['service_station_id'],
            'stringBallotsErrors' => \json_encode($this->arrErros),
            'typeCreation' => 2
        ]);


        if($result){
            if(count($this->arrErros) <= 0) {
                $this->dispatchBrowserEvent('alert',[
                    'type'=> 'success',
                    'message'=> "Cédulas salvas com sucesso"
                ]);
                $this->dispatchBrowserEvent('redirect', [
                    'url' => '/ballots',
                    'delay' => 1000
                ]);
            }else{
                $this->dispatchBrowserEvent('alert',[
                    'type'=> 'warning',
                    'message'=> "Algumas cédulas não foram registradas pois já existe no sistema."
                ]);
            }
        }
    }

    public function creatAvulsoItems($codes){
        $arrErros = [];
        foreach ($codes as $code) {
            $batch = BallotItem::where('cod_ballot', $code)->first();
            if ($batch == null) {
                BallotItem::create([
                    'cod_ballot' => $code,
                    'user_id' => auth()->user()->id,
                    'situation' => 'A',
                    'service_station_id' => $this->fields['service_station_id'],
                    'typeCreation' => 2
                ]);
            } else {
                array_push($arrErros, ['type' => 'Está cédula já existe registrada.', 'code' => $code]);
            }
        }

        if(count($arrErros) > 0){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'error',
                'message'=> "Algumas cédulas não foram registradas pois já existe no sistema."
            ]);
        }

        $this->arrErros = $arrErros;
    }

    public function getBatchCodes($start, $end) {
        $batchCodes = [];

        for ($i = $start; $i <= $end; $i++) {
            $batchCodes[] = (string) $i;
        }

        return $batchCodes;
    }

    public function disableLastSignature($lastSign){
        DirectorSignature::find($lastSign->id)->update([
            "active" => false,
            "date_inactive" => now()
        ]);
    }

    public function AddFunction(){
        if($this->textFunction == ""){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'error',
                'message'=> "Descreva o nome da função"
            ]);
            return false;
        }

        $ex = false;

        foreach($this->functions as $item){
            if ($this->textFunction == $item) {
                $this->dispatchBrowserEvent('alert',[
                    'type'=> 'error',
                    'message'=> "Já existe uma função com esse descritivo"
                ]);
                $ex = true;
                break;
            }
        }

        if($ex == true){
            return false;
        }

        $this->functions[] = $this->textFunction;
        $this->textFunction = "";
    }

    public function messageSuccess(){
        if($this->action == "create"){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Unidade criado com sucesso."
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Unidade foi atualizado com sucesso."
            ]);
        }
    }

    private function validation($fields){



        $errors = [];
        $this->errorsKeys = [];
        $this->errors = [];
        foreach ($fields as $field => $value)
        {



            if($this->checkMandatory($field) && empty(trim($value))){
                array_push($errors, [
                    "message" => "O campo {$field} é obrigatorio",
                    "valid" => false,
                ]);
                $this->errorsKeys[] = $field;
            }
        }

        return $errors;
    }

    public function checkMandatory($field){
        return in_array($field, $this->obrigatory_filds);
    }

    public function enableDisableRegister(){
        $result = (new UnityRepository)->toggleStatus($this->unit->id);
        if($result){
            $this->unit->status = ! $this->unit->status;

            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Unidade desabilitado com sucesso."
            ]);
        }
    }
}
