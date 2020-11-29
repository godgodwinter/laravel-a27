<?php

namespace App\Http\Controllers;

use App\Models\product_unit;
use Illuminate\Http\Request;

class product_unitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product_units=product_unit::all();
        return view('admin.product_units.index',compact('product_units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return redirect('/product_units');
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
            'nama'=>'required',
            'kepanjangan'=>'required'
         
        ],
        [
            'nama.required'=>'Nama harus diisi',
            'kepanjangan.required'=>'Kepanjangan harus diisi'

        ]);

        product_unit::create($request->all());
        return redirect('/product_units')->with('status','Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product_unit  $product_unit
     * @return \Illuminate\Http\Response
     */
    public function show(product_unit $product_unit)
    {
        //
        return redirect('/product_units');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product_unit  $product_unit
     * @return \Illuminate\Http\Response
     */
    public function edit(product_unit $product_unit)
    {
       
        return view('admin.product_units/edit',compact('product_unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product_unit  $product_unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product_unit $product_unit)
    {
        // //
        $request->validate([
            'nama'=>'required',
            'kepanjangan'=>'required'        
        ],
        [
            'nama.required'=>'Nama harus diisi',
            'kepanjangan.required'=>'Kepanjangan harus diisi'


        ]);
         //aksi update
      
        product_unit::where('id',$product_unit->id)
            ->update([
                'nama'=>$request->nama,
                'kepanjangan'=>$request->kepanjangan
            ]);
            return redirect('/product_units')->with('status','Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_unit  $product_unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(product_unit $product_unit)
    {
        //
        product_units::destroy($product_unit->id);
       return redirect('/product_units')->with('status','Data berhasil dihapus!');
}
}
