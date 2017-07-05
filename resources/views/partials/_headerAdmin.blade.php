<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('dashboard_Admin') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>C</b>Net</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Clean</b>Net</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="notifications-menu">
                    <a href="{{ route('depots.lingeClient')}}">
                        <i class="ion-ios-cart"></i>
                        <span class="label label-success">{{ Session::has('linge') ? Session::get('linge')->totalQty : '' }}</span>
                    </a>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">1</span>
                    </a>

                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{--<img src="{{ asset('images/avatar.png') }}" class="user-image" alt="User Image">--}}
                        @if(Auth::check())
                        <span class="hidden-xs">{{ strtoupper(Auth::user()->login) }}</span>
                        @endif
                    </a>

                </li>
            </ul>
        </div>
    </nav>
</header>

<section class="flash">
   @include('layouts._flash')
</section>