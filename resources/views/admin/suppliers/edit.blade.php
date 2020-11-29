@extends('admin.main')

@section('title','Edit Suplier')

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
        {{ session('status') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                <form action="/suppliers/{{$supplier->id}}" method="post">
                    @method('put')
                    @csrf
                    <h5>@yield('title')</h5>
                    <span>&nbsp; </span>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nama">Nama Suplier (*</label>
                                    <input type="text" name="nama" id="input-nama"
                                        class="form-control form-control-alternative  @error('nama') is-invalid @enderror" placeholder="Contoh : Paijo "
                                        value="{{$supplier->nama}}" required>
                                        @error('nama')<div class="invalid-feedback"> {{$message}}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Email Suplier</label>
                                    <input type="email" name="email" id="input-email"
                                        class="form-control form-control-alternative  @error('email') is-invalid @enderror"
                                        placeholder="Contoh : paijo@ymail.com "  value="{{$supplier->email}}">
                                        @error('email')<div class="invalid-feedback"> {{$message}}</div>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-telp">Telp *)</label>
                                    <input type="text" name="telp" id="input-telp"
                                        class="form-control form-control-alternative  @error('telp') is-invalid @enderror"
                                        placeholder="Contoh : 085123456789 "  value="{{$supplier->telp}}" required>
                                        @error('telp')<div class="invalid-feedback"> {{$message}}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-alamat">Alamat *)</label>
                                    <input type="text" name="alamat" id="input-alamat"
                                        class="form-control form-control-alternative  @error('alamat') is-invalid @enderror"
                                        placeholder="Contoh : Jl Kacang Kapri RT ** RW ** Desa Durian Runtuh Kec. Buah Kab. Malang "
                                        value="{{$supplier->alamat}}">
                                        @error('alamat')<div class="invalid-feedback"> {{$message}}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Pilih Bank</label>
                                    <input list="encodings" name="nama_bank"  value="{{$supplier->nama_bank}}"
                                        class="form-control form-control-alternative">
                                    <datalist id="encodings">
                                        <option>BCA</option>
                                        <option>BRI</option>
                                        <option>Bank Jatim</option>
                                        <option>CIMB</option>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-no_rek">No-Rekening Suplier </label>
                                    <input name="no_rek" id="form-control-2" class="form-control input-pill  @error('no_rek') is-invalid @enderror" type="text"
                                        placeholder="700 *** ** ****" id="input-no_rek"  value="{{$supplier->no_rek}}">
                                        @error('no_rek')<div class="invalid-feedback"> {{$message}}</div>
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
