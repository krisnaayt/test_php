<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
    <div class="navbar-header d-xl-block d-none">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item">
                {{-- <h2>Pengadilan Agama Batulicin</h2> --}}
                <a class="navbar-brand" href="{{ $userInfo->user_group == 'admin_surat' ? URL::to('suratPanjar') : '' }}">
                    {{-- <div class="brand-logo"></div> --}}
                    {{-- <span> --}}
                        {{-- <img src="{{ asset('images/logo_pa_batulicin.png') }}" style="max-width: 18%; max-height: 18%"> --}}
                    {{-- </span> --}}
                </a>
            </li>
        </ul>
    </div>
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{ $userInfo->fullname }}</span></div><span><i class="fa fa-user-circle fa-2x"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ URL::to('doLogout') }}"><i class="feather icon-power"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- END: Header-->