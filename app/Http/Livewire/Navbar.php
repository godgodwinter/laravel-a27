<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use App\Facades\Supplier;
use Livewire\Component;

class Navbar extends Component
{
    public $tampungsupplierTotal=0;
    public $cartTotal=0;
    // protected $listeners=[
    //     // 'cartAdded'=>'updateCartTotal',
    //     // 'productRemoved'=>'updateCartTotal',
    //     // 'clearCart'=>'updateCartTotal'
    // ];
    // protected $listeners=[
    //     'pilihAdded'=>'updatetampungsupplierTotal'
    // ];
    
    public function mount(){
        // $this->tampungsupplierTotal=count(Supplier::get()['tampungsupplier']);
        //   $this->cartTotal=count(Cart::get()['products']);
  }
    // public $search;
    public function render()
    {
        return view('livewire.navbar');
    }
    public function updatetampungsupplierTotal(){
    
        // $this->tampungsupplierTotal=count(Supplier::get()['tampungsupplier']);
    }
    // public function updateCartTotal(){
    
    //     $this->cartTotal=count(Cart::get()['products']);
    // }
}
