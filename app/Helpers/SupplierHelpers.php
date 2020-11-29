<?php

namespace App\Helpers;

use App\Models\customer;
use App\Models\Supplier;

Class SupplierHelpers{
    public function __construct(){
       
      if($this->get()===null){
        $this->set($this->empty());
    }
    }
    public function add(customer $supplier){
      // dd($supplier);
      // $tampungsupplier=array();
      $tampungsupplier=$this->get();

        // array_push($tampungsupplier['suppliers'],$supplier);
        $tampungsupplier['tampungsupplier']=$supplier;
        $this->set($tampungsupplier);
        // dd(session()->get('tampungsupplier'));
    }

    public function get(){
      return session()->get('tampungsupplier');
  }
  
  public function empty(){
    return session()->forget('tampungsupplier');;
}
public function set($tampungsupplier){
  session()->put('tampungsupplier',$tampungsupplier);
}
public function clear(){
    $this->set($this->empty());
}



}