<!-- BEGIN: Main Menu-->
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ $userInfo->user_group == 'admin' or $userInfo->user_group == 'admin_surat' ? URL::to('suratPanjar') : ($userInfo->user_group == 'admin_emus' ? URL::to('berkasPerkara') : '') }}">
                        {{-- <div class="brand-logo"></div> --}}
                        <img src="{{ asset('images/logo_pa_batulicin.png') }}" style="max-width: 15%; max-height: 15%">
                        <h2 class="brand-text mb-0">PA Batulicin</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                @if ($userInfo->user_group == 'admin')
                <li class="{{ Request::segment(1) == 'suratPanjar' ? 'active' : '' }}" ><a class="dropdown-item" href="{{ URL::to('/suratPanjar') }}" ><i class="feather icon-file"></i><span >Surat</span></a></li>
                <li class="{{ Request::segment(1) == 'suratReport' ? 'active' : '' }}" ><a class="dropdown-item" href="{{ URL::to('/suratReport') }}" ><i class="feather icon-file"></i><span >Report</span></a></li>
                <li class="{{ Request::segment(1) == 'berkasPerkara' ? 'active' : '' }}" ><a class="dropdown-item" href="{{ URL::to('/berkasPerkara') }}" ><i class="feather icon-file"></i><span >Berkas Perkara</span></a></li>
                @elseif ($userInfo->user_group == 'admin_surat')
                <li class="{{ Request::segment(1) == 'suratPanjar' ? 'active' : '' }}" ><a class="dropdown-item" href="{{ URL::to('/suratPanjar') }}" ><i class="feather icon-file"></i><span >Surat</span></a></li>
                <li class="{{ Request::segment(1) == 'suratReport' ? 'active' : '' }}" ><a class="dropdown-item" href="{{ URL::to('/suratReport') }}" ><i class="feather icon-file"></i><span >Report</span></a></li>
                @elseif($userInfo->user_group == 'admin_emus')
                <li class="{{ Request::segment(1) == 'berkasPerkara' ? 'active' : '' }}" ><a class="dropdown-item" href="{{ URL::to('/berkasPerkara') }}" ><i class="feather icon-file"></i><span >Berkas Perkara</span></a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->