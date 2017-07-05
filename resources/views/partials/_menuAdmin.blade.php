<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="pull-left image">
                <img src="{{ asset('images/avatar.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                @if(Auth::check())
                    <p>{{ strtoupper(Auth::user()->login) }}</p>
                @endif

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <li class="" style="border-bottom: 1px solid #0a0d0e;"><a style="padding: 20px 5px 20px 15px;" href="{{ route('dashboard_Admin') }}"><i class="fa fa-dashboard"></i> <span>Tableau de bord</span></a>
            </li>
            <li class="disabled" style="border-bottom: 1px solid #0a0d0e;"><a style="cursor: not-allowed;padding: 20px 5px 20px 15px;" href="#" class="disabled"><i class="fa fa-user"></i> <span>Utilisateurs</span></a>
            </li>
            <li class="" style="border-bottom: 1px solid #0a0d0e;"><a style="padding: 20px 5px 20px 15px;" href="{{ route('clients') }}"><i class="fa fa-group"></i> <span>Clients</span></a>
            </li>
            <li class="" style="border-bottom: 1px solid #0a0d0e;"><a style="padding: 20px 5px 20px 15px;" href="{{ route('articles.index') }}"><i class="fa fa-cog"></i> <span>Linges</span></a>
            </li>
            <li class="" style="border-bottom: 1px solid #0a0d0e;"><a style="cursor: not-allowed;padding: 20px 5px 20px 15px;" href="#"><i class="fa fa-shopping-cart"></i> <span>Dépenses</span></a>
            </li>
            <li class="" style="border-bottom: 1px solid #0a0d0e;"><a style="cursor: not-allowed;padding: 20px 5px 20px 15px;" href="#"><i class="fa fa-money"></i> <span>Caisse</span></a>
            </li>
            <li class="" style="border-bottom: 1px solid #0a0d0e;"><a style="cursor: not-allowed;padding: 20px 5px 20px 15px;" href="#"><i class="fa fa-trash"></i> <span>Linges en stock</span></a>
            </li>
            <li style="border-bottom: 1px solid #0a0d0e;"><a style="cursor: not-allowed;padding: 20px 5px 20px 15px;" href="pages/calendar.html"><i class="fa fa-calendar"></i> <span>Planning Retraits</span></a>
            </li>
            <li style="border-bottom: 1px solid #0a0d0e;"><a style="padding: 20px 5px 20px 15px;" href="{{ route('admin.parametrage') }}"><i class="fa fa-wrench"></i> <span>Paramétrage</span></a>
            </li>
            <li class="header" syle="bottom: 0;"><a href="{{ route('logout') }}">Se déconnecter</a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>