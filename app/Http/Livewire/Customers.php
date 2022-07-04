<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class Customers extends Component
{
  use WithPagination;
    public $modalFormVisible=false;
    public $modalconfirmingDeletion=false;
    public $customer_id;
    public $name;
    public $phone;
    public $updateShowModal=false;
     /**
     * The Validation reules
     *
     * @return void
     */
    public function rules(){
      return [
        'name'  =>'required|string',
        'phone' =>['required','numeric','starts_with:0',Rule::unique('customers','phone')->ignore($this->customer_id)],
      ];
      
    }
    public function showmodalconfirmingDeletion(){
      $this->modalconfirmingDeletion=true;
    }
    /**
     * shows the form modal
     * of the create  function
     * @return void
     */
    public function createShowModal(){
      $this->clearVars();
      $this->modalFormVisible=true;
      $this->resetValidation();
    }   
      /**
     * the create new customer
     *
     * @return void
     */
    public function create(){
      $this->validate();
      auth()->user()->customers()->create($this->modelData());
      $this->clearVars();
      $this->modalFormVisible=false;
      
    }   
    /**
     * the customer edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id){
      $this->resetValidation();
      $this->customer_id=$id;
      $this->updateShowModal=true;
      $this->loadedModal();
    }   
        
    /**
     * load data form component 
     *
     * @return void
     */
    public function loadedModal(){
      $customer=Customer::findOrFail($this->customer_id);
      $this->name=$customer->name;
      $this->phone=$customer->phone;
    }
    /**
     * the customer update
     *
     * @return void
     */
    public function update(){
        $this->validate();
        if($this->customer_id){
          Customer::findOrFail($this->customer_id)->update($this->modelData());
        }
        $this->resetValidation();
        $this->updateShowModal=false;
        $this->clearVars();
    
    } 
    public function delet(){
      Customer::destroy($this->customer_id);
      $this->modalconfirmingDeletion=false;
    }
    public function deleteShowModal($id){
      $this->customer_id=$id;
      $this->modalconfirmingDeletion=true;
    }
    /**
     * the from the model maped
     * this component
     * @return void
     */
    public function modelData(){
      return [
        'name'=>$this->name,
        'phone'=>$this->phone,
      ];
    }    
    /**
     * Reste all the varibles the 
     * to null.
     *
     * @return void
     */
    public function clearVars(){
      $this->name=null;
      $this->phone=null;
    }
    public function cancel(){

      $this->resetValidation();
      $this->updateShowModal=false;
      $this->modalconfirmingDeletion=false;
      $this->clearVars();
      $this->reset();
    }    
    /**
     * the livewire render function
     *
     * @return void
     */
    public function render()
    {
      $customers=auth()->user()->customers()->paginate(5);
      return view('livewire.customers',compact('customers'));
    }
}
