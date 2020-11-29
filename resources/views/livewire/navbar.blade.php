
<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu"></i>
            </a>
            <a href="index.html">
                <img class="img-fluid" src="{{ asset("admin-style/") }}/files/assets/images/logo.png"
                    alt="Theme-Logo" />
            </a>
            <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>
        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="feather icon-maximize full-screen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
               
                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset("admin-style/") }}/files/assets/images/avatar-4.jpg"
                                class="img-radius" alt="User-Profile-Image">
                            <span>{{ Auth::user()->name }}</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu"
                            data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <a href="#!">
                                    <i class="feather icon-settings"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile.show') }}">
                                    <i class="feather icon-user"></i>
                                    {{ __('Profile') }}
                                </a>
                            </li>
                            <li>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i
                                            class="feather icon-log-out"></i>
                                        {{ __('Logout') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar main-menu">
                <div class="pcoded-navigatio-lavel">Menu</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="">
                        <a href="{{ url('/')}}/dashboard">
                            <span class="pcoded-micon"><i class="feather icon-watch"></i></span>
                            <span class="pcoded-mtext">Dashboard</span>
                        </a>
                    <li class="">
                        <a href="{{url('/')}}/transaksi">
                            <span class="pcoded-micon"><i class="feather icon-plus-square"></i></span>
                            <span class="pcoded-mtext">Jual Baru</span>
                        </a>
                    </li>
                    </li>
                </ul>
                <div class="pcoded-navigatio-lavel">Halaman Developer</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="">
                        <a href="{{ url('/')}}/doc">
                            <span class="pcoded-micon"><i class="feather icon-monitor"></i></span>
                            <span class="pcoded-mtext">Documentation</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('/')}}/aboutus">
                            <span class="pcoded-micon"><i class="feather icon-help-circle"></i></span>
                            <span class="pcoded-mtext">About Us</span>
                        </a>
                    </li>
                </ul>
                <div class="pcoded-navigatio-lavel">Mastering Data Produk</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="">
                        <a href="{{ url('/')}}/suppliers">
                            <span class="pcoded-micon"><i class="feather icon-briefcase"></i></span>
                            <span class="pcoded-mtext">Supplier</span>
                        </a>
                    <li class="">
                        <a href="{{ url('/')}}/product_categories">
                            <span class="pcoded-micon"><i class="feather icon-codepen"></i></span>
                            <span class="pcoded-mtext">Produk Kategori</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('/')}}/product_units">
                            <span class="pcoded-micon"><i class="feather icon-credit-card"></i></span>
                            <span class="pcoded-mtext">Produk Satuan</span>
                        </a>
                    </li>
                    </li>
                </ul>
                <div class="pcoded-navigatio-lavel">Mastering Data Pelanggan</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="">
                        <a href="{{ url('/')}}/customers_categories">
                            <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                            <span class="pcoded-mtext">Kategori Pelanggan</span>
                        </a>
                    <li class="">
                        <a href="{{url('/')}}/customers">
                            <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                            <span class="pcoded-mtext">Pelanggan</span>
                        </a>
                    </li>
                    </li>
                </ul>
                <div class="pcoded-navigatio-lavel">Stok dan Produk</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="">
                        <a href="{{url('/')}}/stocks">
                            <span class="pcoded-micon"><i class="feather icon-plus"></i></span>
                            <span class="pcoded-mtext">Tambah Stok (Proses Stok Barang)</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{url('/')}}/products">
                            <span class="pcoded-micon"><i class="feather icon-list"></i></span>
                            <span class="pcoded-mtext">Lihat Produk</span>
                        </a>
                    <li class="">
                        <a href="#">
                            <span class="pcoded-micon"><i class="feather icon-slash"></i></span>
                            <span class="pcoded-mtext">Stok Barang Habis</span>
                        </a>
                    </li>
                    </li>
                </ul>
                <div class="pcoded-navigatio-lavel">Proses Jual</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="">
                        <a href="{{url('/')}}/transaksis">
                            <span class="pcoded-micon"><i class="feather icon-plus-square"></i></span>
                            <span class="pcoded-mtext">Jual Baru</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#">
                            <span class="pcoded-micon"><i class="feather icon-tag"></i></span>
                            <span class="pcoded-mtext">Draft Penjualan</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#">
                            <span class="pcoded-micon"><i class="feather icon-tv"></i></span>
                            <span class="pcoded-mtext">Transaksi Selesai</span>
                        </a>
                    </li>
                    </li>
                </ul>
                <div class="pcoded-navigatio-lavel">Rekap Penjualan</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="">
                        <a href="#">
                            <span class="pcoded-micon"><i class="feather icon-save"></i></span>
                            <span class="pcoded-mtext">Penjualan Bulan ini</span>
                        </a>
                    <li class="">
                        <a href="#">
                            <span class="pcoded-micon"><i class="feather icon-share"></i></span>
                            <span class="pcoded-mtext">Barang Belum Terjual</span>
                        </a>
                    </li>
                    </li>
                </ul>
            </div>
        </nav>
                      
                   