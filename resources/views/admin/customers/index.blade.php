@extends('admin.main')
@section('title','Pelanggan')
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
            <h5>Data @yield('title')</h5>
        </div>
        <div class="card-block">
            <div class="table-responsive dt-responsive">
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <td>{{ ($loop->index)+1 }} </td>
                            <td>{{$customer->nik}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->nama}}</td>
                            <td>
                                <a class="btn btn-warning btn-outline-warning"
                                    href="/customers/{{$customer->id}}/edit"><span class="pcoded-micon"> <i
                                            class="feather icon-edit"></i></span></a>
                                <form action="/customers/{{$customer->id}}" method="post" class="d-inline">
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
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Kategori</th>
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
                <form action="/customers " method="post">
                    @csrf
                    <h5>Tambah Pelanggan</h5>
                    <span>&nbsp; </span>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nama">NIK (*</label>
                                    <input type="number" name="nik" id="input-name"
                                        class="form-control form-control-alternative  @error('nik') is-invalid @enderror"
                                        placeholder="Contoh : Paijo " value="{{old('nik')}}" required>
                                    @error('nik')<div class="invalid-feedback"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nama">Nama (*</label>
                                    <input type="text" name="name" id="input-name"
                                        class="form-control form-control-alternative  @error('name') is-invalid @enderror"
                                        placeholder="Contoh : Paijo " value="{{old('name')}}" required>
                                    @error('name')<div class="invalid-feedback"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nama">No HP (*</label>
                                    <input type="number" name="phone" id="input-name"
                                        class="form-control form-control-alternative  @error('phone') is-invalid @enderror"
                                        placeholder="Phone : Paijo " value="{{old('phone')}}" required>
                                    @error('phone')<div class="invalid-feedback"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nama">Alamat (*</label>
                                    <input type="text" name="address" id="input-name"
                                        class="form-control form-control-alternative  @error('address') is-invalid @enderror"
                                        placeholder="Contoh : Paijo " value="{{old('address')}}" required>
                                    @error('address')<div class="invalid-feedback"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xl-6 m-b-30">
                                <h4 class="sub-title">Pilih Kategori</h4>
                                <select name="customers_categories_id"
                                    class="form-control form-control-info  @error('customers_categories_id') is-invalid @enderror"
                                    required>
                                    @foreach ($customers_categories as $customers_category)
                                    <option value="{{$customers_category->id}}">{{$customers_category->nama}}</option>
                                    @endforeach
                                </select> @error('customers_categories_id')<div class="invalid-feedback"> {{$message}}
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
