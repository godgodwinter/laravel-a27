@extends('admin.main')

@section('title','Documentation')

@section('headernav')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>@yield('title') {{ Carbon\Carbon::parse(date('d F Y'))->translatedFormat('d F Y') }}</h4>
                    <span>Halaman Pengembang</span>
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

@section('container')
    

  <!-- Page-body start -->
  <div class="page-body">
    <div class="row">

  {{-- VersiEngine Start --}}
  <div class="col-xl-6 col-md-12">
    <div class="card user-card-full">
        <div class="row m-l-0 m-r-0">
            <div class="col-sm-4 bg-c-lite-green user-profile">
                <div class="card-block text-center text-white">
                    <div class="m-b-25">
                        <svg class="icon icon-lg" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.938 6.497a6.958 6.958 0 0 0-.702 1.694L0 9v2l3.236.809c.16.6.398 1.169.702 1.694l-1.716 2.861 1.414 1.414 2.86-1.716a6.958 6.958 0 0 0 1.695.702L9 20h2l.809-3.236a6.96 6.96 0 0 0 1.694-.702l2.861 1.716 1.414-1.414-1.716-2.86a6.958 6.958 0 0 0 .702-1.695L20 11V9l-3.236-.809a6.958 6.958 0 0 0-.702-1.694l1.716-2.861-1.414-1.414-2.86 1.716a6.958 6.958 0 0 0-1.695-.702L11 0H9l-.809 3.236a6.96 6.96 0 0 0-1.694.702L3.636 2.222 2.222 3.636l1.716 2.86zM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" fill-rule="evenodd">
                            </path>
                        </svg>
                    </div>
                <h6 class="f-w-600">{{ ucfirst(config('app.name'))}}</h6>
                    <p>A27 Shop</p>
                    <i class="feather icon-edit m-t-10 f-16"></i>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card-block">
                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information Framework</h6>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">Laravel</p>
                            <h6 class="text-muted f-w-400">LARAVEL 8.*</h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">Bootstrap</p>
                            <h6 class="text-muted f-w-400">Bootstrap v4.0.0-beta</h6>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">PHP</p>
                            <h6 class="text-muted f-w-400">php 7.4</h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">Javascript</p>
                            <h6 class="text-muted f-w-400">jQuery UI - v1.12.1 - 2016-09-14</h6>
                        </div>
                    </div>
                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects Dev</h6>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">Programmer</p>
                            <h6 class="text-muted f-w-400">Kukuh Setya Nugraha</h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">Analysis System</p>
                            <h6 class="text-muted f-w-400">Cak Aris</h6>
                        </div>
                    </div>
                    
                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                        <li><a href="https://twitter.com/kakadlz" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook"><i class="feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.facebook.com/k.zuya97/" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter"><i class="feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/kukuh.sn/" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram"><i class="feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
  {{-- VersiEngine  End--}}
  

<!-- DocumentationSection Start -->
  <div class="col-md-12 col-xl-12">
<div class="card">
    <div class="card-header">
        <div class="card-header-left">
            <h5>Laporan Perbaiki Versi</h5>
        </div>
        {{-- <p>-<code>.#</code> </p> --}}
    </div>
    <div class="card-block">
        <label class="label label-success">26 Oktober 2020</label>
        <p>-<code>.#</code> Perbaiki <em>Navigasi</em> pada <b>Admin Head</b>.</p>        
    

      
    </div>
    <div class="card-block">
        <label class="label label-success">23 Oktober 2020</label>
        <p>-<code>.#</code> Perbaiki <em>Navigasi</em> pada <b>Admin Head</b>.</p>        
        <p>-<code>.#</code> Pebaiki <em>Navigasi</em> menggunakan Icon Per Menu</p>
        <p>-<code>.#</code> Buat file <em>Menu Dashboard</em> </p>
        <p>-<code>.#</code> Buat file <em>Sample Menu</em> untuk Dasar Pembuatan Halaman <i>Menu Admin</i></p>
        <p>-<code>.#</code> Buat file <em>Menu Documentation</em> untuk mengetahui Perubahan yang telah dilakukan</p>
        <p>-<code>.#</code> Buat Design <strong>Database Baru</strong> untuk Laravel 8.*</p>
        <p>-<code>.#</code> Buat Migrasi  <em>Table Suppliers</em> untuk menu mastering Suplier</p>
        <p>-<code>.#</code> Buat file <em>Menu Suppliers</em> untuk menu mastering Suplier</p>
        <p>-<code>.#</code> Buat file dan CRUD <em>Menu Product Categories</em> untuk menu mastering Kategori Produk</p>
        <p>-<code>.#</code> Buat file dan CRUD <em>Menu Product Units</em> untuk menu mastering Satuan Produk</p>
        <p>-<code>.#</code> Buat file dan CRUD <em>Menu Customer Categories</em> untuk menu mastering Kategori Pelanggan</p>
        <p>-<code>.#</code> Buat file <em>Menu Customer</em> untuk menu mastering Pelanggan</p>


      
    </div>
    <div class="card-block">
        <label class="label label-success">22 Oktober 2020</label>
        <p>-<code>.#</code> Migrasi dari <em>Code Igniter 3</em> ke <em><strong>Laravel 8</strong></em>.</p>
        <p>-<code>.#</code> Parsing <em>Bootstrap</em> ke <em><strong>Laravel 8</strong></em> menggunakan <em>Blade</em>.</p>
    </div>
   
</div>
</div>
<!-- DocumentationSection end -->

</div>
</div>
<!-- page body -->
@endsection