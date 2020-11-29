<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\customers_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;

class customersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
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
        
        $customer = DB::select("SELECT customers.id,customers.nik,customers.name,customers.phone,customers.address,
                                customers.customers_categories_id,customers_categories.nama FROM customers,customers_categories
                                WHERE customers.customers_categories_id=customers_categories.id");

    $customers_categories=customers_category::all();
    Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return view('admin.customers.index', ['customers' => $customer],compact('customers_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        $request->validate([
            'nik'=>'required|unique:customers|numeric',       
            'customers_categories_id'=>'required|exists:customers_categories,id'       
        ],
        [
            'nik.required'=>'Nama harus diisi',
            'customers_categories_id.exists' => 'Not an existing ID'

        ]);
        customer::create($request->all());
        return redirect('/customers')->with('status','Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
        // $customer = DB::select("SELECT customers.id,customers.nik,customers.name,customers.phone,customers.address,
        // customers.categories_id,customers_categories.nama FROM customers,customers_categories
        // WHERE customers.categories_id=customers_categories.id");
        
        $customers_categories=customers_category::all();
        return view('admin.customers/edit',compact('customer'),compact('customers_categories'));
        // return dd($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        //
       
        $request->validate([
            'nik'=>'required|numeric',       
            'customers_categories_id'=>'required|exists:customers_categories,id'       
        ],
        [
            'nik.required'=>'Nama harus diisi',
            'customers_categories_id.exists' => 'Not an existing ID'

        ]);
        customer::where('id',$customer->id)
            ->update([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'customers_categories_id'=>$request->customers_categories_id,
                'address'=>$request->address,
            ]);
            return redirect('/customers')->with('status','Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        //
        customer::destroy($customer->id);
        return redirect('/customers')->with('status','Data berhasil dihapus!');
    }
}
