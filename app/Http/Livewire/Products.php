<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Validation\Rule;

class Products extends Component
{
    public $name ;
    public $price=1 ;
    public $product_qu=1;
    public $modalFormVisible=false;
 

    
     

     
    /**
     * createShowModal
     * Show Form To Insert Data Into Product Model
     *
     * @return void
     */
    public function createShowModal()
    {
      $this->resetValidation();
      $this->modalFormVisible=true;
    }

    public function rules(){
        return [
            'name'  =>'required|string',
            'price' =>'required|regex:/^\d+(\.\d{1,2})?$/'
        ];
    }

    public function create(){
        $this->validate();
      auth()->user()->products()->create($this->formData());
        $this->clearVars();
    }
    
    private function formData(){
        return [
            'name'  =>$this->name,
            'price' =>$this->price,
        ];
    }

    private function clearVars(){
        $this->name='';
        $this->price='';
    }
   
    public function render()
    { 
        $products=Product::simplepaginate(5);
        return view('livewire.products',compact('products'));
    }
}
