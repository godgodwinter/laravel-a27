<?php
namespace App\Http\Livewire;
use App\Facades\Supplier as FacadesSupplier;
use App\Facades\Cart;
use App\Models\customer;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\product;
use App\Models\Sales;
use App\Models\Sales_details;
use App\Models\stocks_detail;
use Carbon\Carbon;
use UxWeb\SweetAlert\SweetAlert;
use Alert;
// use SweetAlert;
// use SweetAlert;

class Transaksi extends Component
{    
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $ambilsupplierterpilih=0;
    public $cartTotal=0;
    public $caribarang='';
    public $pembayarantunai=0;
    public $diskon=0;
    public $search='';
    public $jmlbaranghapus=0;
    public $arrjmlbaranghapus='';
    public $jmlbarangtambah=0;
    public $defaultjmlbarangtambah=0;
    public $Supplierterpilih;
    public $cart;
    public $thapus=0;
    public $thapus_id=0;
    public $thapus_input=0;
    public $thapus_input_isi=1;
    public $tpilihP=0;
    public $tpilihP_id=0;
    protected $listeners=[
        //update suplier
        'pilihAdded'=>'updateNamaSupplierTerpilih',
        'clearFacadesSupplier'=>'updateNamaSupplierTerpilih',
        //update chart
        'productRemoved'=>'updateCartTotal',
        'cartAdded'=>'updateCartTotal',
        'clearCart'=>'updateCartTotal',
        'cartAdded'=>'updateKeranjang',
        //update keranjang
        'removeItem'=>'updateCartTotal',
        'removeItem'=>'updateKeranjang'
    ];
    // protected $queryString = ['search'];
    public function mount(){
    // dd(!empty(session()->get('tampungsupplier')));
        if(!empty(session()->get('tampungsupplier'))){
            $this->ambilsupplierterpilih=FacadesSupplier::get()['tampungsupplier'];
        }
        $this->cartTotal=count(Cart::get()['products']);
        $this->cart=Cart::get();
            if($this->cart!==null){
                // dd($this->cart['products']);

                
            // $uniques = array();
            // foreach ($this->cart['products'] as $obj) {
            //     $uniques[$obj['id']] = $obj;
            // }

            // foreach ($uniques as $productkeranjang2){
            //     // array_push($this->arrjmlbaranghapus,$productkeranjang2['id']=>$jmlbaranghapus);
            //     // $this->jmlbaranghapus=[$productkeranjang2['id']]=0;
            //       }
            }
            if(!empty(session()->get('tampungdiskon'))){
                $this->diskon=session()->get('tampungdiskon');
            }
            if(!empty(session()->get('tampungpembayarantunai'))){
                $this->pembayarantunai=session()->get('tampungpembayarantunai');
            }

        }
    public function render()
    {
        // dd(!empty(session()->get('tampungdiskon')));
        // SweetAlert::message('Robots are working!');
     

        if(empty($this->pembayarantunai)){
            $this->pembayarantunai=0;
        }
        if(empty($this->diskon)){
            $this->diskon=0;
        }
        //suplier 
        $customers=customer::paginate(5);
        if($this->search!==null){
            $customers=customer::where('name', 'like', '%'. $this->search.'%')->paginate(5);
        }

        //caribarang
        $products = DB::select("SELECT products.id,products.nama,products.sku,products.harga_modal
        ,products.harga_jual,product_units.nama as nama_unit,product_categories.nama as nama_category 
        FROM products,product_units,product_categories
        WHERE products.product_units_id=product_units.id 
            AND products.product_categories_id=product_categories.id");
//query jmlbarang di stock ready
//SELECT products.id,products.nama FROM `product_stocks_details`,product_stocks,products WHERE product_stocks_details.product_stocks_id=product_stocks.id AND products.id=product_stocks.products_id AND product_stocks_details.status="ready"

            // $numrows= DB::select("select `products`.`id`, `products`.`nama`, `product_stocks`.`jml` from `products` inner join `product_stocks` on `product_stocks`.`products_id` = `products`.`id` where (`product_stocks`.`products_id` = products.id)");
            $numrows= DB::select("SELECT products.id,products.nama FROM `product_stocks_details`,product_stocks,products WHERE product_stocks_details.product_stocks_id=product_stocks.id AND products.id=product_stocks.products_id AND product_stocks_details.status=\"ready\"");

            if($this->caribarang!==null){
                $products = DB::select("SELECT products.id,products.nama,products.sku,products.harga_modal
                ,products.harga_jual,product_units.nama as nama_unit,product_categories.nama as nama_category 
                FROM products,product_units,product_categories
                WHERE products.product_units_id=product_units.id 
                    AND products.product_categories_id=product_categories.id AND products.nama LIKE '%$this->caribarang%'");
            }
        // $suppliers=Supplier::paginate(5);
        // SweetAlert::message('Robots are working!');
        Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        //main render
        return view('livewire.transaksi',[
            'customers'=>$customers,
            'products'=>$products,
            'numrows'=>$numrows
        ])
        ->layout('layouts.main');
    }
    public function addToPilih(int $productID){
        FacadesSupplier::add(Customer::where('id',$productID)->first());
        $this->emit('pilihAdded');
        // dd(FacadesSupplier::get());
    }
    public function updateNamaSupplierTerpilih(){
    // dd($ambilsupplierterpilih);  
    // dd(!empty(session()->get('tampungsupplier')));
    if(!empty(session()->get('tampungsupplier'))){
            $this->ambilsupplierterpilih=FacadesSupplier::get()['tampungsupplier'];
        }
        // $this->ambilsupplierterpilih=FacadesSupplier::get()['tampungsupplier'];
    }
    public function updateKeranjang(){
  
    $this->cart=Cart::get();
    $this->cartTotal=count(Cart::get()['products']);
    }
    public function clearTerpilih(){
        
        FacadesSupplier::clear();
        $this->emit('clearFacadesSupplier');
        $this->ambilsupplierterpilih=FacadesSupplier::get();
        }
    public function addToCart(int $productID,$jmlbarangakanditambah=1,$sisa=0){
        // dd($jmlbarangakanditambah);
    if($sisa<$jmlbarangakanditambah){

    }else{
        for($i=1;$i<=$jmlbarangakanditambah ;$i++){
            Cart::add(product::where('id',$productID)->first());
            $this->emit('cartAdded');
        }
    }
            // return dd($this->cartTotal);
        }
        
    public function updatetampungsupplierTotal(){
    
        // $this->tampungsupplierTotal=count(Supplier::get()['tampungsupplier']);
    }
    public function updateCartTotal(){
    
        $this->cartTotal=count(Cart::get()['products']);
    }
    
    public function clearBarang(){
        Cart::clear();
        $this->emit('clearCart');
        $this->cart=Cart::get();
        }

    public function removeItem($productId,$jmlbaranghapustemp=1){
        // dd($jmlbaranghapustemp);
        for($i=1;$i<=$jmlbaranghapustemp;$i++){
            Cart::removeItem($productId);
            $this->cart= Cart::get();
            $this->emit('productRemoved');
        }
        
        $this->jmlbaranghapus=0;
        }
    public function tombolHapus($p){
        // dd($productId);
        $this->thapus_id=$p;
        $this->jmlbaranghapus=0;
            if($this->thapus===0){
                $this->thapus=1;
            }else{
                $this->thapus=0;
            }
            }
    public function tombolPilihProduct($idp,$defjml){
        // dd($productId);
        $this->tpilihP_id=$idp;
        $this->tpilihP=0;
        $this->jmlbarangtambah=$defjml;
            if($this->tpilihP===0){
                $this->tsimpanP=1;
            }else{
                $this->tsimpanP=0;
            }
            }

    public function applyharga($pembayarantunai=0,$diskon=0){
            session()->put('tampungpembayarantunai',$pembayarantunai);
            session()->put('tampungdiskon',$diskon);
    }
    public function clearapplyharga($pembayarantunai=0,$diskon=0){
            session()->forget('tampungpembayarantunai');
            session()->forget('tampungdiskon');
            $this->pembayarantunai=0;
            $this->diskon=0;
    }
    public function checkout($id_pelanggan=0,$total=0,$pembayarantunai=0,$diskon=0,$total_bayar=0,$kembalian=0,$harga_diskon=0){
        $this->cart=Cart::get();
    //   dd('id_pelanggan='.$id_pelanggan.'total='.$total.'pembayaran tunai ='.$pembayarantunai.'total bayar='.$total_bayar.'kembalian='.$kembalian.'hargadiskon='.$harga_diskon.'keranjang'.$this->cart['products']);
    //   dd($this->cart['products']);

    //simpan nota penjualan (sales)
    $Sales= new Sales();
    $Sales->customers_id=$id_pelanggan;
    $Sales->tgl_penjualan=Carbon::now();
    $Sales->total_bayar=$total_bayar;
    $Sales->pembayaran_tunai=$pembayarantunai;
    $Sales->diskon=$diskon;
    $Sales->harus_dibayar=$total_bayar;
    $Sales->pengembalian=$kembalian;
    $Sales->total_diskon=$harga_diskon;
    $Sales->save();

    $Saleslast = Sales::orderBy('id', 'desc')->first();
    // dd($Saleslast['id']);

    //simpan detail nota(sales detail) barang yang dibeli
    // dd($this->cart['products']);
    //ambil data detail stock where id product status raeady
    // dd($this->cart['products']);
    // $jml=count($this->cart['products']);
    foreach($this->cart['products'] as $cr){
// dd($this->cart['products']);
$id=$cr['id'];
$harga_jual=$cr['harga_jual'];
$nama=$cr['nama'];
// d($id.'<br>');
$numrows= DB::select("SELECT product_stocks_details.id,products.id as products_id,products.nama FROM `product_stocks_details`,product_stocks,products WHERE product_stocks_details.product_stocks_id=product_stocks.id AND products.id=product_stocks.products_id AND product_stocks_details.status=\"ready\" AND products.id='$id' LIMIT 1");
// dd($numrows);
foreach($numrows as $nr){
    // dd($nr->id);
    $nr_id=$nr->id;
    $nr_products_id=$nr->products_id;
    $nr_nama=$nr->nama;

//add sales detail 1 1
 $Sales_details= new Sales_details();
    $Sales_details->sales_id=$Saleslast['id'];
    $Sales_details->product_stocks_details_id=$nr_id;
    $Sales_details->products_id=$id;
    $Sales_details->harga_terjual=$harga_jual;
    $Sales_details->products_nama=$nama;
    $Sales_details->save();

    //update stock detail 1 1
    stocks_detail::where('id',$nr_id)
    ->update([
        'status'=>'sold'
    ]);
}


    }
   
    //hapus session 1 1
    session()->forget('tampungpembayarantunai');
    session()->forget('tampungdiskon');
    $this->pembayarantunai=0;
    $this->diskon=0;
    //hapus keranjang 
    Cart::clear();
    $this->emit('clearCart');
    $this->cart=Cart::get();
    
    Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
}
}
