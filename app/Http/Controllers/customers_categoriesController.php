<?php

namespace App\Http\Controllers;

use App\Models\customers_category;
use Illuminate\Http\Request;

class customers_categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers_categories=customers_category::all();
        return view('admin.customers_categories.index',compact('customers_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return redirect('/customers_categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama'=>'required'
         
        ],
        [
            'nama.required'=>'Nama harus diisi'

        ]);

        customers_category::create($request->all());
        return redirect('/customers_categories')->with('status','Data berhasil di tambahkan');
        // return dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customers_category  $customers_category
     * @return \Illuminate\Http\Response
     */
    public function show(customers_category $customers_category)
    {
        //
        return redirect('/customers_categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customers_category  $customers_category
     * @return \Illuminate\Http\Response
     */
    public function edit(customers_category $customers_category)
    {
        //
        
        return view('admin.customers_categories/edit',compact('customers_category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customers_category  $customers_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customers_category $customers_category)
    {
        //
        
        $request->validate([
            'nama'=>'required'        
        ],
        [
            'nama.required'=>'Nama harus diisi'

        ]);
         //aksi update
      
        customers_category::where('id',$customers_category->id)
            ->update([
                'nama'=>$request->nama
            ]);
            return redirect('/customers_categories')->with('status','Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customers_category  $customers_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(customers_category $customers_category)
    {
        //
        customers_category::destroy($customers_category->id);
        return redirect('/customers_categories')->with('status','Data berhasil dihapus!');
    }
}
