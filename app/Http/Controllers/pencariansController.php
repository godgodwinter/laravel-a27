<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\customer;
use App\Models\customers_category;
use App\Models\Supplier;

class pencariansController extends Controller
{
    //
     /**
     * Display the specified resource.
     *
     * @param  int  $keyword
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //testing relasi 1 to many
        // $customer = customer::find(1);
        // return $customer->customers_categories->nama;
        // $customers=customer::all();
        // return view('admin.customers.index',compact('customers'));
        
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($keyword)
    {
        //
        $supplier = DB::select("SELECT * FROM suppliers
        WHERE nama LIKE '%$keyword%' OR
            email  LIKE '%$keyword%' ");



return view('admin.pencarian.index', ['suppliers' => $supplier]);
    }

    
    public function add()
    {
      


return view('admin.pencarian.add');
    }
}
