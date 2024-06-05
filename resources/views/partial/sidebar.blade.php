<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="text-center">
                <img src="assets/images/users/avatar-1.jpg" alt="" class="img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Kenny
                        Rigdon</a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)"> Profile</a></li>
                        <li><a href="javascript:void(0)"> Settings</a></li>
                        <li><a href="javascript:void(0)"> Lock screen</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0)"> Logout</a></li>
                    </ul>
                </div>

                <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                
                <li>
                    <a href="/dashboard" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                </li>

                <li>
                    <a href="/lobi" class="waves-effect"><i class="mdi mdi-exit-to-app"></i><span> Loby
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

                @if(Auth::user()->level == 1)
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-folder-outline"></i> <span> Master Data
                        </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="/toko">Toko</a></li>
                        <li><a href="/produk">Produk</a></li>
                        <li><a href="/users">Users</a></li>
                    </ul>
                </li>
                @endif
                
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
