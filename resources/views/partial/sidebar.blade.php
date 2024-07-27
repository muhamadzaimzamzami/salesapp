<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="text-center">
                <img src="{{ asset('assets/images/users/user_i.png') }}" alt="" class="img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->fullname }}</a>
                    
                </div>

                <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> {{ session('name_store')}}</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                
                <li>
                    <a href="/dashboard" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                </li>

                <li>
                    <a href="/lobi" class="waves-effect"><i class="mdi mdi-exit-to-app"></i><span> Lobby
                        </span></a>
                </li>
                @if (Auth::user()->level == 3 || Auth::user()->level == 1)
                <li>
                    <a href="/penjualan" class="waves-effect"><i class="mdi mdi-sale"></i><span> Penjualan
                        </span></a>
                </li>
                @endif

                @if (Auth::user()->level == 2 || Auth::user()->level == 1)
                <li>
                    <a href="/pesanan" class="waves-effect"><i class="mdi mdi-receipt"></i><span> Pesanan
                        </span></a>
                </li>
                    @if (session('status') == 1)
                    <li>
                        <a href="/produk-toko" class="waves-effect"><i class="mdi mdi-barcode-scan"></i><span> Produk Toko
                            </span></a>
                    </li>
                    @endif
                @endif

                <li>
                    <a href="/toko" class="waves-effect"><i class="mdi mdi-exit-to-app"></i><span> Toko
                        </span></a>
                </li>

                @if(Auth::user()->level == 1)
                <li>
                    <a href="/produk" class="waves-effect"><i class="mdi mdi-dropbox"></i><span> Master Produk
                        </span></a>
                </li>
                <li>
                    <a href="/users" class="waves-effect"><i class="mdi mdi-account-multiple"></i><span> Users Management
                        </span></a>
                </li>
                <li>
                    <a href="/laporan" class="waves-effect"><i class="mdi mdi-book-multiple"></i><span> Report </span></a>
                </li>
                
                @endif
                
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
