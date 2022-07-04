<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Invoices extends Component
{

    

    public  function coun(){
       
        dd('abc');
    }
    public function render()
    {
        return view('livewire.invoices');
    }
}
