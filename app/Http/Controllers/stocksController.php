<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\product_category;
use App\Models\product_unit;
use App\Models\stock;
use App\Models\stocks_detail;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class stocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function jmlstock($id_product){
    //     $stocks_details = stocks_detail::where('product_stocks_id', '=', $id_product)->count();
    //     return $stocks_detail;
    // // dd($stocks_detail);
    // }
    public function index()
    {
        //
    // $product_id=5;
        $product = DB::select("SELECT products.id,products.nama,products.sku,products.harga_modal
                    ,products.harga_jual,product_units.nama as nama_unit,product_categories.nama as nama_category 
                    FROM products,product_units,product_categories
                    WHERE products.product_units_id=product_units.id 
                        AND products.product_categories_id=product_categories.id");
                        //SELECT * FROM `product_stocks`,products,product_stocks_details WHERE products.id=1 AND product_stocks.id=product_stocks_details.product_stocks_id AND products.id=product_stocks.products_id
        // $numrows= DB::select("SELECT products.id,SUM(product_stocks.jml) as jml FROM `product_stocks`,products WHERE products.id=product_stocks.products_id GROUP BY products.id");
        //    $numrows= DB::table('product_stocks')
        //    ->select('products.id','products.nama','product_stocks.jml')
        //    ->join('products','product_stocks.products_id','=','products.id')
        //    ->where(['product_stocks.products_id' => 'products.id'])
        //    ->get();
           //select `products`.`id`, `products`.`nama`, `product_stocks`.`jml` from `product_stocks` inner join `products` on `product_stocks`.`products_id` = `products`.`id` where (`product_stocks`.`products_id` = products.id ) 
        //    $numrows= DB::table('products')
        //    ->select('products.id','products.nama','product_stocks.jml')
        //    ->join('product_stocks','product_stocks.products_id','=','products.id')
        //    ->where(['product_stocks.products_id' => 'products.id'])
        //    ->get();
    $numrows= DB::select("select `products`.`id`, `products`.`nama`, `product_stocks`.`jml` from `products` inner join `product_stocks` on `product_stocks`.`products_id` = `products`.`id` where (`product_stocks`.`products_id` = products.id)");

        $product_categories=product_category::all();
        $product_units=product_unit::all();
        $stocks_details=stocks_detail::all();

        // $stocks_details = stocks_detail::where('product_stocks_id', '=', $product_id)->count();
        
        return view('admin.stocks.index', ['products' => $product],compact('product_units','product_categories','numrows'));
    }

    
    public function add(product $product)
    {
        //
        // dd($product);
        $product_categories=product_category::all();
        $product_units=product_unit::all();
        $suppliers=Supplier::all();
        
        return view('admin.stocks/add',compact('product','suppliers','product_units','product_categories'));

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
        //ubah harga modal dan jual menjadi number
        $harga_modal=$request->harga_modal;
        $exharga_modal=explode(" ",$harga_modal);
        $rplc1harga_modal=str_replace(",","",$exharga_modal);
        $rplc2harga_modal=str_replace(".","",$rplc1harga_modal);

        
        $harga_jual=$request->harga_jual;
        $exharga_jual=explode(" ",$harga_jual);
        $rplc1harga_jual=str_replace(",","",$exharga_jual);
        $rplc2harga_jual=str_replace(".","",$rplc1harga_jual);
        
        //ambil data dari form

        //ulangi jml

        //masukkan data stok ke dalam database

        $stocks= new Stock();
        $stocks->tgl_po=$request->tgl_po;
        $stocks->jml=$request->jml;
        $stocks->suppliers_id=$request->suppliers_id;
        $stocks->products_id=$request->products_id;

        $stocks->save();
        $stocks_id=$stocks->id;

        // dd($stocks->id);
        //masukkan detail stok ke dalam database diulangi sampai jumlah
        for ($x = 0; $x <= ($request->jml-1); $x++) {
            $stock_details= new stocks_detail();
            $stock_details->product_stocks_id=$stocks_id;
            $stock_details->harga_modal=$rplc2harga_modal[count($rplc1harga_modal)-1];
            $stock_details->harga_jual=$rplc2harga_jual[count($rplc2harga_jual)-1];
            $stock_details->status="ready";

            $stock_details->save();
        }

        
        // $stock_details->id;


        //return berhasil

        //kembali ke tambah stok
        // return dd($request);
        return redirect('/stocks')->with('status',"$x Stok berhasil di tambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(stock $stock)
    {
        //
    }
}
