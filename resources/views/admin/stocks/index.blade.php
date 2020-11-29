@extends('admin.main')
@section('title','Stok Barang')
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
                            <th>Kategori</th>
                            <th>Harga Modal</th>
                            <th>Harga Jual</th>
                            <th class="text-center">Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="dom-jqry-body">
                        @foreach ($products as $product)
                            <?php $jmlstok=0; ?>
                            @foreach ($numrows as $numrow)
                                @if($numrow->id===$product->id)
                                    <?php $jmlstok+=$numrow->jml;
                                            ?>
                                @else
                                
                                @endif
                            @endforeach
                        <tr>
                            {{-- {{dd($numrows)}} --}}
                            <td>{{ ($loop->index)+1 }} </td>
                            <td>{{$product->nama}}</td>
                            <td>{{$product->nama_category}}</td>
                            <td>@currency($product->harga_modal)</td>
                            <td>@currency($product->harga_jual)</td>
                            <td class="text-center"> 
                               {{$jmlstok}}
                                {{-- {{dd($numrows)}} --}}
                               
                                 {{-- {{$product->id}} - 
                                @if(!isset($numrows[$product->id]->jml))
                                0
                                @else
                                
        {{$numrows[$product->id]->jml}}
                                @endif --}}
                                 {{-- {{ App\Models\stocks_detail::where('product_stocks_id', $product->id)->count() }} --}}
                                </td>
                            <td>
                            <a class="btn btn-primary btn-outline-primary" id="targetpilihstock{{$product->id}}"  href="/stocks/{{$product->id}}/add"><span class="pcoded-micon"> <i
                                            class="feather icon-file-plus"></i>Tambah Stok</span></a>
                            </td>
                        </tr>

                        
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga Modal</th>
                            <th>Harga Jual</th>
                            <th class="text-center">Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- DOM/Jquery table end -->
</div>
<!-- Section end -->
<!-- page body -->
@endsection
