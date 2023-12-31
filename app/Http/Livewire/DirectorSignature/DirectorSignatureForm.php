<?php

namespace App\Http\Livewire\DirectorSignature;

use App\Http\Repositories\UnityRepository;
use App\Models\DirectorSignature;

use App\Models\User;
use Livewire\Component;
use App\Models\Unit;
use App\Models\Profession;
use Livewire\WithFileUploads;


use App\Http\Repositories\ProfileRepository;
class DirectorSignatureForm extends Component
{

    use WithFileUploads;
    public $errorsKeys = [];
    public $errors = [];

    public $currentEditValue = "";
    public $functions = [];
    public $textFunction = "";

    public $cpf;

    public $rowEdit = "";

    public $fileSign = "";

    public $directorSign;

    public $perfilName;
    public $daysToAccessInspiration;
    public $daysToActivityLock;
    public $obrigatory_filds = [
        "user_id",
        "unit_id"
    ];
    public $unit;
    public $action;

    public $fields = [
        "user_id" => "",
        "unit_id" => ""
    ];

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
        return view('livewire.directorSignature.director-signature-form');
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
        dd($item);
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

        if($this->directorSign){
            $this->fields = [
                "id" => $this->directorSign->id,
                "user_id" => $this->directorSign->user_id,
                "unit_id" => $this->directorSign->unit_id
            ];

            $this->attachments = \json_decode($this->directorSign->otherFiles, true);
            $this->oldAttachments = \json_decode($this->directorSign->otherFiles, true);
            $this->user = User::find($this->directorSign->user_id);
            $this->cpf = $this->user->cpf;
            $this->getAllFunctions($this->user);
            $this->fields['file_signature'] = $this->directorSign->file_signature;
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


    public function save(){


        $this->fields['file_signature'] = $this->fileSign;

        $validation = $this->validation($this->fields);

        if($this->fileSign){
            $filename = $this->fileSign->store('public/signatures');
            $this->fields['file_signature'] = basename($filename);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Item excccccluido com sucesso."
            ]);
        }


        if(count($validation) > 0){
            $this->errors = $validation;

            $this->dispatchBrowserEvent('alert',[
                'type'=> 'error',
                'message'=> $validation[0]["message"]
            ]);
            return false;
        }


        if($this->action == "create"){

            $attchaments = $this->storeOtherAttachments();

            $lastSign = DirectorSignature::latest()->first();

            $signature = DirectorSignature::create([
                "user_id" => $this->fields['user_id'],
                "unit_id" => $this->fields['unit_id'],
                "file_signature" => $this->fields['file_signature'],
                "date_active" => now(),
                "otherFiles" => $attchaments
            ]);

            if(isset($lastSign->id)){
                $this->disableLastSignature($lastSign);
            }

        } else {
            $attchaments = $this->storeOtherAttachments();

            $signature = DirectorSignature::updateOrCreate(['id' => $this->directorSign->id ?? 0],[
                "user_id" => $this->fields['user_id'],
                "unit_id" => $this->fields['unit_id'],
                "file_signature" => $this->fields['file_signature'] ?? $this->directorSign->file_signature,
                "otherFiles" => $attchaments
            ]);
        }

        if($signature){
            $this->messageSuccess();
            $this->dispatchBrowserEvent('redirect',[
                'url'=> '/director-signature',
                'delay' => 1000
            ]);
        }
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
