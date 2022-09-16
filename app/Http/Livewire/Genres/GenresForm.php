<?php

namespace App\Http\Livewire\Genres;

use Livewire\Component;
use App\Models\Genre;
use App\Http\Repositories\ProfileRepository;
class GenresForm extends Component
{

    public $errorsKeys = [];
    public $errors = [];

    public $perfilName;
    public $daysToAccessInspiration;
    public $daysToActivityLock;
    public $obrigatory_filds = [
      "name"
    ];
    public $genres;
    public $action;
    public $fields = [
        "name" => ""
    ];
    public function render()
    {
        return view('livewire.genres.genres-form');
    }

    public function mount()
    {
        if($this->genres){
            $this->fields = [
                "name" => $this->genres->name
            ];
        }
    }

    public function saveProfile(){
        $validation = $this->validation($this->fields);

        if(count($validation) > 0){
            $this->errors = $validation;

            $this->dispatchBrowserEvent('alert',[
                'type'=> 'error',
                'message'=> $validation[0]["message"]
            ]);
            return false;
        }

        $genres = Genre::updateOrCreate(['id' => $this->genres->id ?? 0],[
            'name' => $this->fields["name"]
        ]);

        if($genres){
            $this->messageSuccess();
            $this->dispatchBrowserEvent('redirect',[
                'url'=> '/genres',
                'delay' => 1000
            ]);
        }
    }

    public function messageSuccess(){
        if($this->action == "create"){
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Genero criado com sucesso."
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Genero foi atualizado com sucesso."
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
        $result = (new ProfileRepository)->toggleStatus($this->genres->id);
        if($result){
            $this->genres->status = ! $this->genres->status;

            $this->dispatchBrowserEvent('alert',[
                'type'=> 'success',
                'message'=> "Genero desabilitado com sucesso."
            ]);
        }
    }
}
