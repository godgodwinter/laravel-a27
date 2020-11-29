<?php

namespace App\Http\Controllers;

use App\Models\product_category;
use Illuminate\Http\Request;

class product_categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product_categories=product_category::all();
        return view('admin.product_categories.index',compact('product_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return redirect('/product_categories');
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

        product_category::create($request->all());
        return redirect('/product_categories')->with('status','Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function show(product_category $product_category)
    {
        //
        return redirect('/product_categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function edit(product_category $product_category)
    {
        //
        return view('admin.product_categories/edit',compact('product_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product_category $product_category)
    {
        //
        $request->validate([
            'nama'=>'required'        
        ],
        [
            'nama.required'=>'Nama harus diisi'

        ]);
         //aksi update
      
        product_category::where('id',$product_category->id)
            ->update([
                'nama'=>$request->nama
            ]);
            return redirect('/product_categories')->with('status','Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(product_category $product_category)
    {
        //  
       product_category::destroy($product_category->id);
        return redirect('/product_categories')->with('status','Data berhasil dihapus!');
    }
}
