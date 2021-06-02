<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
    <div class="navbar-header d-xl-block d-none">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item">
                <a class="navbar-brand" href="{{ $userInfo->user_group == 'admin' || $userInfo->user_group == 'admin_surat' ? URL::to('suratPanjar') : URL::to('berkasPerkara') }}">
                    <img class="font-weight-bold" src="{{ asset('images/logo_pa_batulicin.png') }}" style="max-width: 9%; max-height: 9%">
                    &nbsp;<strong>PA Batulicin</strong>
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
                    @if($userInfo->user_group == 'admin_emus' or $userInfo->username == 'admin')
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up" id="notifCountBell"></span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white" id="notifCountHeader"></h3><span class="notification-title">App Notifications</span>
                                </div>
                            </li>
                            <li class="scrollable-container media-list" id="notifGroup">
                                
                            </li>
                            <li class="dropdown-menu-footer" id="readAllNotifGroup">
                                
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600">{{ $userInfo->nama }}</span>
                                <span class="user-status">{{ $userInfo->jabatan }}</span>
                            </div>
                            <span><i class="fa fa-user-circle fa-2x"></i></span>
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