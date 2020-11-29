<div class="page-body">
    <div class="row">
        <!-- statustic-card start -->
        @php($total=0)
        @foreach ($cart['products'] as $productper1)
        @php($keranjangttll[$productper1['id']]=0)
        @endforeach
        {{-- // mengisi variable --}}
        @foreach ($cart['products'] as $productper1)
        @php($keranjangttll[$productper1['id']]+=1)
        @php($total+=$productper1['harga_jual'])

        @endforeach


        @php($harga_diskon=($diskon/100)*$total)
        @php($total_bayar=($total-$harga_diskon))
        @php($kembalian=($pembayarantunai-$total_bayar))
        @if(!empty(session()->get('tampungsupplier')))
        @php($tampungsupplier=1)
        @else
        @php($tampungsupplier=0)
        @endif

        <?php
        // dd(session()->get('tampungsupplier'));
        ?>

         <?php
        // if(!empty(session()->get('tampungdiskon'))){
        //     $diskon=session()->get('tampungdiskon');
        // }
        // if(!empty(session()->get('tampungpembayarantunai'))){
        //    $pembayarantunai=session()->get('tampungpembayarantunai');
        // }
         ?>
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        <div class="col-xl-4 col-md-12">
            <div class="card feed-card">
                <div class="card-header">
                </div>
                <div class="card-block">
                    <div class="row m-b-30">
                        <div class="col">
                            <label class="form-control-label mt-2" for="caribarang">Cari Barang</label>
                            <input type="text" wire:model="caribarang" id="caribarang" placeholder="Cari Suplier... "
                                class="form-control mt-1">
                            <label class="form-control-label mt-2" for="pembayarantunai">Pembayaran Tunai (Uang)</label>
                            <input type="number" wire:model="pembayarantunai" id="pembayarantunai"
                                placeholder="Pembayaran Tunai " class="form-control mt-0" data-a-sign="Rp " value="0"
                                required>
                                <label class="form-control-label mt-2" for="diskon">Diskon %</label>
                            <input type="number" wire:model="diskon" id="diskon"
                                placeholder="Diskon " class="form-control mt-0" min="0" max="100" value="0"
                                required>

                            <button wire:click="applyharga({{$pembayarantunai}},{{$diskon}})" class="btn btn-primary float-right mt-2 ml-2">Apply
                                Harga </button>
                            <button wire:click="clearapplyharga({{$pembayarantunai}},{{$diskon}})" class="btn btn-dark float-right mt-2 ml-2">Clear Harga</button>
                            @if (($cart['products']) AND (($kembalian)>=0) AND ($tampungsupplier===1))
                            <button wire:click="checkout" class="btn btn-success mt-2">Checkout </button>
                            @else

                            <button type="button" class="btn btn-secondary mt-2" data-toggle="tooltip" data-placement="bottom"
                                title="Uang Pembayaran kurang dari total biaya dan pilih suplier">
                                Checkout
                            </button>


                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">


                <div class="col mb-4 text-center mt-2">
                    <span class="badge badge-dark float-right"> Keranjang : {{$cartTotal}}</span>
                    <h5 class="float-left"> Total Harga : @currency($total)</h5>
                </div>
                <div class="col mb-4 text-center mt-2">
                    <h5 class="float-left"> Diskon :{{$diskon}}% </h5>
                    <span class="badge badge-dark float-right"> Harga Diskon : @currency($harga_diskon)</span>
                </div>
                <div class="col mb-4 text-center mt-2">
                    <h5 class="float-left"> Total Bayar : @currency($total_bayar)</h5>
                    <span class="badge badge-dark float-right"> Pembayaran Tunai : @currency($pembayarantunai)</span>
                </div>
                <div class="col mb-4 text-center mt-2">
                    <h5 class="float-left"> Kembalian : @currency($kembalian)</h5>
                </div>
                <div class="card-body">

                    <ul class="list-group">
                        {{-- {{dd($cart['products'])}} --}}
                        {{-- //buat variable per product --}}



                        <?php 
// dd($cart['products']);

$uniques = array();
foreach ($cart['products'] as $obj) {
    $uniques[$obj['id']] = $obj;
}

// dd($uniques);
// dd($uniques);
 ?>
                        @foreach ($uniques as $productkeranjang)
                        <li class="list-group-item">
                            {{-- {{dd($productkeranjang)}} --}}
                            <button type="button" class="btn btn-dark btn-block mb-2"><span
                                    wire:click="tombolHapus({{$productkeranjang['id']}})"><b>{{$productkeranjang['nama']}}</b>
                                    &nbsp; <span class="badge badge-dark float-right">
                                        Price:
                                        @currency($productkeranjang['harga_jual'])</span></button>
                            <span
                                class="badge badge-dark float-right">Jumlah:{{$keranjangttll[$productkeranjang['id']]}}</span>
                            </span>
                            @if ($thapus===1 AND $thapus_id===$productkeranjang['id'])
                            <div class="form-group row">
                                <div wire:model="jmlbaranghapus" class="col">
                                    <input id="jmlproduct" type="number"
                                        max="{{$keranjangttll[$productkeranjang['id']]}}" min="1"
                                        value="{{$keranjangttll[$productkeranjang['id']]}}" class="form-control"
                                        placeholder="col">
                                </div>
                            </div>

                            <div class="float-right">
                                @php($thapus_input=$jmlbaranghapus)
                                @if($thapus_input===0)
                                @php($thapus_input_isi=$keranjangttll[$productkeranjang['id']])

                                @else
                                @php($thapus_input_isi=$jmlbaranghapus)
                                @endif
                                <button wire:click="removeItem({{$productkeranjang['id']}},{{$thapus_input_isi}})"
                                    class="btn btn-danger">Remove ({{$thapus_input_isi}})</button>
                            </div>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>

                <button wire:click="clearBarang" class="btn btn-danger mb-2 mt-2"><span class="pcoded-micon"> <i
                            class="feather icon-warning"></i>Kosongkan
                        Keranjang?</button>

            </div>
        </div>
        <div class="col-xl-8 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-left ">
                        <h5>Pilih Barang</h5>
                    </div>
                </div>
                <div class="card-block-big">
                    <div id="container">
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-styling">
                                    <thead>
                                        <tr class="table-primary">
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Harga Modal</th>
                                            <th>Harga Jual</th>
                                            <th>Stok</th>
                                            <th colspan=3>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- {{dd($suppliers)}} --}}



                                        @foreach ($products as $product)
                                        @php($sisastock=0)
                                        @php($jmlstok=0)
                                        @foreach ($numrows as $numrow)
                                        @if($numrow->id===$product->id)

                                        @php($jmlstok+=$numrow->jml)
                                        @else

                                        @endif
                                        @endforeach

                                        @if(isset($keranjangttll[$product->id]))
                                        @php($keranjangtotal=$keranjangttll[$product->id])
                                        @else
                                        @php($keranjangtotal=0)
                                        @endif


                                        @php($sisastock=(($jmlstok)-($keranjangtotal)))

                                        <tr>
                                            <td>{{ ($loop->index)+1 }} </td>
                                            <td>{{$product->nama}}</td>
                                            <td>@currency($product->harga_modal)</td>
                                            <td>@currency($product->harga_jual)</td>
                                            <td>
                                                {{$sisastock}}
                                            </td>
                                            <td>

                                                @php($defaultjmlbarangtambah2=0)
                                                @if($tpilihP===0)
                                                <button
                                                    wire:click="tombolPilihProduct({{$product->id}},{{$defaultjmlbarangtambah2}})"
                                                    class="btn btn-success"><span class="pcoded-micon"> <i
                                                            class="feather icon-edit"></i>Pilih</button>


                                                @else

                                                @endif
                                            </td>
                                            <td>

                                                @if($tpilihP_id===$product->id)


                                                <div class="form-group row">
                                                    <div class="col" wire:model="jmlbarangtambah">
                                                        <input id="jmlproduct" type="number" max="{{$sisastock}}"
                                                            min="0" value="{{$jmlbarangtambah}}" class="form-control"
                                                            placeholder="col" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td>

                                                <button
                                                    wire:click="addToCart({{$product->id}},{{$jmlbarangtambah}},{{$sisastock}})"
                                                    class="btn btn-success"><span class="pcoded-micon"> <i
                                                            class="feather icon-edit"></i>Simpan</button>
                                                @else

                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    &nbsp;
                </div>
            </div>
        </div>
        <!-- statustic-card start -->
    </div>
    <!-- DOM/Jquery table start -->
    <!-- Product start -->
    <div class="row">
        <!-- statustic-card start -->
        <div class="col-xl-4 col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-left ">
                        <h5>Cari Pelanggan</h5>
                    </div>
                </div>
                <div class="card-block-big"> <input type="text" wire:model="search" placeholder="Cari Suplier... "
                        class="form-control mt-1">
                    <div class="card-block">
                        {{-- {{dd($Supplierterpilih)}} --}}
                        {{-- @foreach ($Supplierterpilih['tampungsupplier'] as $st) --}}
                        <div class="row m-b-30">
                            <div class="col-auto p-r-0">
                                <i class="feather icon-bell bg-simple-c-blue feed-icon"></i>
                            </div>
                            <div class="col">
                                {{-- {{dd(isset($ambilsupplierterpilih['nama']))}} --}}
                                <h6 class="m-b-5">Nama Supplier :
                                    @if (isset($ambilsupplierterpilih['nama'])===true)
                                    {{$ambilsupplierterpilih['nama']}}
                                    @else
                                    Belum dipilih
                                    @endif</h6>
                            </div>
                        </div>
                        {{-- @endforeach --}}
                        <div class="row m-b-30">
                            @if (isset($ambilsupplierterpilih['nama'])===true)
                            <button wire:click="clearTerpilih" class="btn btn-warning"><span class="pcoded-micon"> <i
                                        class="feather icon-primary"></i>Pilih Suplier
                                    lagi?</button>
                            @else
                            <button class="btn btn-warning"><span class="pcoded-micon"> <i
                                        class="feather icon-edit"></i>Clear Disabled</button>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-md-8">
            <div class="card feed-card">
                <div class="card-header">
                    <h5>Pilih Suplier</h5>
                </div>
                <div id="container">
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-styling">
                                <thead>
                                    <tr class="table-primary">
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{dd($suppliers)}} --}}
                                    @foreach ($suppliers as $supplier)
                                    <tr>
                                        <td>{{ ($loop->index)+1 }} </td>
                                        <td>{{$supplier->nama}}</td>
                                        <td>
                                            <button wire:click="addToPilih({{$supplier->id}})"
                                                class="btn btn-success"><span class="pcoded-micon"> <i
                                                        class="feather icon-edit"></i>Pilih</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (isset($ambilsupplierterpilih['nama'])===true)
                            @else
                            {{$suppliers->links('pagination::bootstrap-4') }}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    &nbsp;
                </div>
            </div>
        </div>

        <!-- statustic-card start -->
    </div>
    <!-- Product end -->
    <!-- Page body end -->
</div>
<!-- Section end -->
<!-- page body -->
