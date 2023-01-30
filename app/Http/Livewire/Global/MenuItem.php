<?php

namespace App\Http\Livewire\Global;

use Livewire\Component;

class MenuItem extends Component
{
    public $title; 
    public $classIcon; 
    public $href; 
    public $can; 
    public $is_dropdown = false;
    
    public function render()
    {
        return view('livewire.global.menu-item');
    }
}
