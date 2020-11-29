@extends('admin.main')
@section('title','Jual Baru')
@section('csshere')
<!-- Data Table Css -->
<link rel="stylesheet" type="text/css"
    href="{{ asset("admin-style/") }}/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css"
    href="{{ asset("admin-style/") }}/files/assets/pages/data-table/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css"
    href="{{ asset("admin-style/") }}/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
@endsection
@section('jshere')
<!-- data-table js -->
<script type="text/javascript" src="{{ asset("js/") }}/transaksi.js"></script>
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
    <!-- DOM/Jquery table start -->
<form action="pencarian/Consequatur/edit" method="get">
    <div class="col-sm-6">
        <div class="input-group input-group-button">
            <input type="text" class="form-control" placeholder="Cari Suplier" name="keyword" size="40" autofocus
                autocomplete="off" id="keyword">
            <button type="submit" name="cari" id="tombolcari" class="input-group-addon btn btn-primary"
                id="basic-addon10">
                <span class="">Cari</span>
            </button>
        </div>
    </div>
</form>
    {{-- <input type="text" id="fname" onkeyup="myFunction()">
<script>
function myFunction() {
  var x = document.getElementById("fname");
  x.value = x.value.toUpperCase();
}
</script> --}}
    <!-- DOM/Jquery table start -->
    <div class="card">
        <div id="container">
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-styling">
                        <thead>
                            <tr class="table-primary">
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{ ($loop->index)+1 }} </td>
                                <td>{{$supplier->nama}}</td>
                            <td>{{$supplier->email}}</td>
                            <td> <button class="btn btn-warning btn-outline-warning"
                            href="/pencarian/add/{{$supplier->id}}" id="{{$supplier->id}}"><span class="pcoded-micon"> <i
                                        class="feather icon-edit"></i>Pilih</span></button></td>
                            </tr>

                     <script>
                        $(document).ready(function() {
                        var container2 = document.getElementById("container2");
                        $("#{{$supplier->id}}").on('click', function() {
                        //   alert('ok' + this.id);
                        $('#container2').load('pencarian/add/a');
                       
                        });
                       });
                     </script>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- DOM/Jquery table end -->

        <!-- buat form ketika sudah memilih suplier-->
        
        <div class="card">
            <div id="container2">
               <!-- container supplier -->
               <h1>tes</h1>
            </div>
        </div>
        <!-- DOM/Jquery table end -->

</div>
<!-- Section end -->
<!-- page body -->
@endsection
