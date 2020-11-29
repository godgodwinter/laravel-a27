@extends('admin.main')
@section('title','Produk')
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
                        <a href="index.html"> <i class="feather icon-home"></i> </a>
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
    <!-- DOM/Jquery table start -->
    <div class="card">
        <div class="card-header">
        <h5>Data @yield('title') </h5>
        </div>
        <div class="card-block">
            <div class="table-responsive dt-responsive">
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>SKU</th>
                            <th>Kategori</th>
                            <th>Harga Modal</th>
                            <th>Harga Jual</th>
                            <th>Satuan</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ ($loop->index)+1 }} </td>
                            <td>{{$product->nama}}</td>
                            <td>{{$product->sku}}</td>
                            <td>{{$product->nama_category}}</td>
                            <td>@currency($product->harga_modal)</td>
                            <td>@currency($product->harga_jual)</td>
                            <td>{{$product->nama_unit}}</td>
                            <td>
                                <a class="btn btn-success btn-outline-success"
                                    href="/products/{{$product->id}}/tambahstok"><span class="pcoded-micon"> <i
                                            class="feather icon-maximize-2"></i>Detail</span></a>
                                <a class="btn btn-warning btn-outline-warning"
                                    href="/products/{{$product->id}}/edit"><span class="pcoded-micon"> <i
                                            class="feather icon-edit"></i></span></a>
                                <form action="/products/{{$product->id}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-outline-warning"
                                        onclick="return  confirm('Anda yakin menghapus data ini? Y/N')"><span
                                            class="pcoded-micon"> <i class="feather icon-delete"></i></span></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>SKU</th>
                            <th>Kategori</th>
                            <th>Harga Modal</th>
                            <th>Harga Jual</th>
                            <th>Satuan</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- DOM/Jquery table end -->
    <!-- tambah -->
    <div class="card">
        <div class="card-block">
            <div class="card-body">
                <form action="/products " method="post">
                    @csrf
                    <h5>Tambah Satuan Produk</h5>
                    <span>&nbsp; </span>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nama">Nama Produk (*</label>
                                    <input type="text" name="nama" id="input-nama"
                                        class="form-control form-control-alternative  @error('nama') is-invalid @enderror"
                                        placeholder="" value="{{old('nama')}}" required>
                                    @error('nama')<div class="invalid-feedback"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <?php 
                            $sku=date('Ymdhis');
                            ?>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nama">SKU atau code (*</label>
                                    <input type="text" name="sku" id="input-nama"
                                        class="form-control form-control-alternative  @error('sku') is-invalid @enderror"
                                placeholder="" value="SKU{{$sku}}" required readonly>
                                        {{-- {{old('sku')}} --}}
                                    @error('sku')<div class="invalid-feedback"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nama">Harga Modal (*</label>
                                    <input type="text" name="harga_modal" id="input-nama"
                                        class="form-control form-control-alternative  @error('harga_modal') is-invalid @enderror currency"
                                        data-a-sign="Rp " placeholder=""
                                        value="{{old('harga_modal')}}" required>
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
                                        value="{{old('harga_jual')}}" required>
                                    @error('harga_jual')<div class="invalid-feedback"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="col-lg-6 col-sm-6 col-xl-6 m-b-30">
                                <h4 class="sub-title">Pilih Kategori</h4>
                                <select name="product_categories_id"
                                    class="form-control form-control-info  @error('product_categories_id') is-invalid @enderror"
                                    required>
                                    @foreach ($product_categories as $product_category)
                                    <option value="{{$product_category->id}}">{{$product_category->nama}}</option>
                                    @endforeach
                                </select> @error('product_categories')<div class="invalid-feedback"> {{$message}}
                                </div>
                                @enderror
                            </div>
                            {{-- {{dd($product_units)}} --}}
                            <div class="col-lg-6 col-sm-6 col-xl-6 m-b-30">
                                <h4 class="sub-title">Pilih Satuan</h4>
                                <select name="product_units_id"
                                    class="form-control form-control-info  @error('product_units_id') is-invalid @enderror"
                                    required>
                                    @foreach ($product_units as $product_unit)
                                    <option value="{{$product_unit->id}}">{{$product_unit->nama}}</option>
                                    @endforeach
                                </select> @error('product_units')<div class="invalid-feedback"> {{$message}}
                                </div>
                                @enderror
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
