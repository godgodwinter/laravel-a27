@extends('admin.main')
@section('title','Tambah Stok Barang')
@section('csshere')
<!-- Data Table Css -->
<link rel="stylesheet" type="text/css"
    href="{{ asset("admin-style/") }}/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css"
    href="{{ asset("admin-style/") }}/files/assets/pages/data-table/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css"
    href="{{ asset("admin-style/") }}/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
<!-- jpro forms css -->
<link rel="stylesheet" type="text/css" href="{{ asset("admin-style/") }}/files/assets/pages/j-pro/css/demo.css">
<link rel="stylesheet" type="text/css"
    href="{{ asset("admin-style/") }}/files/assets/pages/j-pro/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset("admin-style/") }}/files/assets/pages/j-pro/css/j-forms.css">
@endsection
@section('jshere')
<!-- data-table js -->
{{-- <script src="{{ asset("js/") }}/jquery-3.5.1.js" ></script> --}}
<script src="{{ asset("js/") }}/stock.js" ></script>
    crossorigin="anonymous"></script>
@endsection
@section('headernav')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>@yield('title')</h4>
                    <span>Halaman Mastering</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">@yield('title')</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('notif')
@if (session('status'))
<div class="alert alert-info border-info">
    {{ session('status') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            class="pcoded-micon"> <i class="feather icon-x-square"></i></span>
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@endsection
@section('container')
<!-- Section start -->
<div class="page-body">
    
    
    <!-- tambah -->
    <div class="card">
        <div class="card-block">
            <div class="card-body">
                <form action="/stocks" method="post">
                    @csrf
                    <h5>PO Barang</h5>
                    <span>&nbsp; </span>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nama">Nama Produk (*</label>
                                <input type="hidden" name="products_id" value="{{$product->id}}">
                                    <input type="hidden" name="tgl_po" value="<?php echo date("Y-m-d H:i:s");?>">
                                    <input type="text" name="nama" id="input-nama"
                                        class="form-control form-control-alternative  @error('nama') is-invalid @enderror"
                                        placeholder="" value="{{$product->nama}}" required  readonly>
                                    @error('nama')<div class="invalid-feedback"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <?php 
                            $tglskrg=date('Y-m-d');
                            // dd($tglskrg);
                            ?>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nama">Tanggal PO (*</label>
                                    <input type="text" name="tglpo" id="input-nama"
                                        class="form-control form-control-alternative"
                                        placeholder="" value="@tanggalindo<?php $tglskrg;?>" required readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nama">Harga Modal (*</label>
                                    <input type="text" name="harga_modal" id="input-nama"
                                        class="form-control form-control-alternative  @error('harga_modal') is-invalid @enderror currency"
                                        data-a-sign="Rp " placeholder=""
                                        value="{{$product->harga_modal}}" required>
                                    @error('harga_modal')<div class="invalid-feedback"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nama">Harga Jual (*</label>
                                    <input type="text" name="harga_jual" id="input-nama"
                                        class="form-control form-control-alternative  @error('harga_jual') is-invalid @enderror currency"
                                        data-a-sign="Rp " placeholder=""
                                        value="{{$product->harga_jual}}" required>
                                    @error('harga_jual')<div class="invalid-feedback"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="col-lg-6 col-sm-6 col-xl-6 m-b-30">
                                <h4 class="sub-title">Pilih Supplier  //* </h4>
                                <select name="suppliers_id"
                                    class="form-control form-control-info  @error('suppliers_id') is-invalid @enderror"
                                    required>
                                    @foreach ($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->nama}}</option>
                                    @endforeach
                                </select> @error('product_categories')<div class="invalid-feedback"> {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nama">Jumlah (*</label>
                                  <input type="number" name="jml" id="input-nama"
                                        class="form-control form-control-alternative  @error('jml') is-invalid @enderror"
                                        placeholder="" value="1" required min="1">
                                    @error('jml')<div class="invalid-feedback"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                           
                        </div>
                    </div>
            </div>
            <hr class="my-4" />
            <!-- Address -->
            <h6 class="heading-small text-muted mb-4">Aksi</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="Simpan" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tambah end -->
</div>
<!-- Section end -->
<!-- page body -->
@endsection
