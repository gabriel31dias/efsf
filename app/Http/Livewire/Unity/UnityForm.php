<?php

namespace App\Http\Livewire\Unity;

use App\Http\Repositories\UnityRepository;
use Livewire\Component;
use App\Models\Unit;
use App\Models\Profession;

use App\Http\Repositories\ProfileRepository;
class UnityForm extends Component
{

    public $errorsKeys = [];
    public $errors = [];

    public $currentEditValue = "";
    public $functions = [];
    public $textFunction = "";

    public $rowEdit = "";

    public $perfilName;
    public $daysToAccessInspiration;
    public $daysToActivityLock;
    public $obrigatory_filds = [
      "name"
    ];
    public $unit;
    public $action;
    public $fields = [
        "name" => "",
        "protocol_unit" => "",
        "acronym" => ""
    ];
    public function render()
    {
        return view('livewire.unity.unity-form');
    }


    public function saveNewValue($item, $unit_id){
        $index = array_search($item, $this->functions);

        $this->functions[$index] = $this->currentEditValue;
        $backup = $this->currentEditValue;
        $this->currentEditValue = "";

        if($unit_id == null){
            return false;
        }


        $profission = Profession::where(['unit_id' => $unit_id])->where(['name' => $item])->first();
        if(isset($profission->id)){
            $profission->update(["name" => $backup]);
        }

        $this->rowEdit = "";

        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> "Item atualizado com sucesso."
        ]);
    }

    public function mount()
    {
        if($this->unit){
            $this->fields = [
                "id" => $this->unit->id,
                "name" => $this->unit->name,
                "protocol_unit" => $this->unit->protocol_unit,
                "acronym"  => $this->unit->acronym,
            ];
            $this->functions = Profession::where(['unit_id' => $this->unit->id])->get('name')->map(function ($item) {
                return $item->name;
            })->toArray();
        }
    }

    public function setEditingRow($item){
        $this->rowEdit = $item;
    }

    public function createOrUpdateFunctions($unit_id){
        foreach($this->functions as $item){
            $profission = Profession::where(['unit_id' => $unit_id])->where(['name' => $item ])->first();
            if(isset($profission->id)){

            }else{
                Profession::create([
                    'name' => $item,
                    'unit_id' => $unit_id
                ]);
            }
        }
    }

    public function destroy_unit($profission, $unit_id){

        $index = array_search($profission, $this->functions);

        unset($this->functions[$index]);

        if($profission == null || $unit_id == null){
            return false;
        }

        $p = Profession::where(["unit_id" => $unit_id])->where(["name" => $profission])->first();
        if(isset($p->id)){
            $p->delete();
        }

        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> "Item excluido com sucesso."
        ]);
    }

    public function save(){
        $validation = $this->validation($this->fields);

        if(count($validation) > 0){
            $this->errors = $validation;

            $this->dispatchBrowserEvent('alert',[
                'type'=> 'error',
                'message'=> $validation[0]["message"]
            ]);
            return false;
        }


        if($this->action == "create"){
            $unit = Unit::create(['name'=> $this->fields['name'], "acronym" => $this->fields['acronym'] ]);
        } else {
            $unit = Unit::updateOrCreate(['id' => $this->unit->id ?? 0],$this->fields);
        }

        if(isset($unit->id)){
            $this->createOrUpdateFunctions($unit->id);
        }

        if($unit){
            $this->messageSuccess();
            $this->dispatchBrowserEvent('redirect',[
                'url'=> '/unit',
                'delay' => 1000
            ]);
        }
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
