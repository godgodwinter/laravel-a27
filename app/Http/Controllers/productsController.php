<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\product_category;
use App\Models\product_unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = DB::select("SELECT products.id,products.nama,products.sku,products.harga_modal
                    ,products.harga_jual,product_units.nama as nama_unit,product_categories.nama as nama_category 
                    FROM products,product_units,product_categories
                    WHERE products.product_units_id=product_units.id 
                        AND products.product_categories_id=product_categories.id");

$product_categories=product_category::all();
$product_units=product_unit::all();

return view('admin.products.index', ['products' => $product],compact('product_units','product_categories'));
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
        //
        $harga_modal=$request->harga_modal;
        $exharga_modal=explode(" ",$harga_modal);
        $rplc1harga_modal=str_replace(",","",$exharga_modal);
        $rplc2harga_modal=str_replace(".","",$rplc1harga_modal);

        
        $harga_jual=$request->harga_jual;
        $exharga_jual=explode(" ",$harga_jual);
        $rplc1harga_jual=str_replace(",","",$exharga_jual);
        $rplc2harga_jual=str_replace(".","",$rplc1harga_jual);
        
        

        // $string2=preg_match('/^(\D+)(\d+)$/', $request->harga_jual, $harga_jual);
        // $harga_jual=number_format($request->harga_jual, 2, ',', '.');
        
        // return dd($rplc2harga_modal);

        $request->validate([
            'nama'=>'required',       
            'sku'=>'required',       
            'harga_modal'=>'required',       
            'harga_jual'=>'required',       
            'product_categories_id'=>'required',       
            'product_units_id'=>'required'       
        ]);

         $product= new Product;
        $product->nama=$request->nama;
        $product->sku=$request->sku;
        $product->harga_modal=$rplc2harga_modal[1];
        $product->harga_jual=$rplc2harga_jual[1];
        $product->product_categories_id=$request->product_categories_id;
        $product->product_units_id=$request->product_units_id;

        $product->save();

        // product::create($request->all());
        return redirect('/products')->with('status','Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //   
        $product_categories=product_category::all();
        $product_units=product_unit::all();
        
        return view('admin.products/edit',compact('product','product_units','product_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        
        $harga_modal=$request->harga_modal;
        $exharga_modal=explode(" ",$harga_modal);
        $rplc1harga_modal=str_replace(",","",$exharga_modal);
        $rplc2harga_modal=str_replace(".","",$rplc1harga_modal);
        

        
        $harga_jual=$request->harga_jual;
        $exharga_jual=explode(" ",$harga_jual);
        $rplc1harga_jual=str_replace(",","",$exharga_jual);
        $rplc2harga_jual=str_replace(".","",$rplc1harga_jual);
     

        // dd(count($rplc2harga_jual)-1);
        // dd($rplc2harga_jual);
        $request->validate([
            'nama'=>'required',       
            'sku'=>'required',       
            'harga_modal'=>'required',       
            'harga_jual'=>'required',       
            'product_categories_id'=>'required',       
            'product_units_id'=>'required'       
        ]);

        //aksi update
        Product::where('id',$product->id)
            ->update([
                'nama'=>$request->nama,
                'sku'=>$request->sku,
                'harga_modal'=>$rplc2harga_modal[count($rplc1harga_modal)-1],
                'harga_jual'=>$rplc2harga_jual[count($rplc2harga_jual)-1],
                'product_categories_id'=>$request->product_categories_id,
                'product_units_id'=>$request->product_units_id
            ]);
            
        return redirect('/products')->with('status','Data berhasil di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
        product::destroy($product->id);
        return redirect('/products')->with('status','Data berhasil dihapus!');
    }
}
