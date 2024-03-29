<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BAT - Dashboard</title>
    <meta name="description" content="BAT - Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ URL::asset('apple-icon.png') }}">
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ URL::asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendors/selectFX/css/cs-skin-elastic.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('vendors/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
     <link rel="stylesheet" href="{{ URL::asset('vendors/chosen/chosen.min.css') }}">
     <link rel="stylesheet" href="{{ URL::asset('vendors/notify/css/notify.css') }}">


    <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">

    <link href='{{URL::asset('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800')}}' rel='stylesheet' type='text/css'>
    <script src="https://kit.fontawesome.com/3c703a09cb.js"></script>
</head>

<body>

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{URL::asset('images/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{URL::asset('images/logo2.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">

                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('/dashboard-consumer') }}"> <i class="menu-icon fa fa-dashboard"></i>Consumer </a>
                    </li>
                    <h3 class="menu-title">Content</h3>
             

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="ti-server"></i><a href="{{ url('/product') }}">Product Master</a></li>
                            <li><i class="fa fa-location-arrow"></i><a href="{{ url('/location') }}">Location</a></li>
                        </ul>
                    </li>


                     <li class="menu-item-has-children dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                             aria-expanded="false"> <i class="menu-icon fa fa-bar-chart-o"></i>Consumer Statistic</a>
                         <ul class="sub-menu children dropdown-menu">
                             <li><i class="menu-icon fa fa-bar-chart-o"></i><a href="{{ route('view.consumer.location') }}">Location</a></li>
                             <li><i class="menu-icon fa fa-bar-chart-o"></i><a href="{{ route('view.consumer.location.121') }}">Location By 121</a></li>
                             <li><i class="menu-icon fa fa-bar-chart-o"></i><a href="{{ route('view.consumer.location.event') }}">Location By Event</a></li>
                             <li><i class="menu-icon fa fa-bar-chart-o"></i><a href="{{ route('view.consumer.location.ncp') }}">Location By NCP</a></li>
                             <li><i class="menu-icon fa fa-bar-chart-o"></i><a href="{{ route('view.consumer.location.ss') }}">Location By SS</a></li>
                             <li><i class="menu-icon fa fa-bar-chart-o"></i><a href="{{ route('view.consumer.location.ktp') }}">Location By KTP</a></li>
                             <li><i class="menu-icon fa fa-bar-chart-o"></i><a href="{{ route('view.product.type') }}">Current Product</a></li>
                            
                         </ul>
                     </li>

                </ul>

            </div>
        </nav>
    </aside>

    <div id="right-panel" class="right-panel">

        <header id="header" class="header">

            <div class="header-menu">
              
                <div class="col-sm-7">
                  <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" style="padding-top:20px;" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span >{{ Auth::user()->name }}</span> &nbsp; &nbsp; <img class="user-avatar rounded-circle" src="{{URL::asset('images/admin.jpg')}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        
        @yield('content')

    </div>

    {{-- MODAL HAPUS --}}
    <div class="modal fade" id="modal_hapus_product_master" tabindex="-1" role="dialog" aria-labelledby="modal_hapus_product_masterLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_hapus_product_masterLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin ingin menghapus data ini ?
                    <form id="form_hapus_data_product" class="needs-validation" novalidate>
                        @csrf {{ method_field('DELETE') }}
                        <input type="hidden" name="hapus_product_master" id="hapus_product_master" value="">
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" form="form_hapus_data_product" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal_hapus_locationMaster" tabindex="-1" role="dialog" aria-labelledby="modal_hapus_locationMasterLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_hapus_locationMasterLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin ingin menghapus data ini ?
                    <form id="form_hapus_data_location" class="needs-validation" novalidate>
                        @csrf {{ method_field('DELETE') }}
                        <input type="hidden" name="hapus_location_master" id="hapus_location_master" value="">
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" form="form_hapus_data_location" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{URL::asset('vendors/jquery/dist/jquery.js')}}"></script>
    <script src="{{URL::asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{URL::asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/main.js')}}"></script>


    <script src="{{URL::asset('vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/dashboard.js')}}"></script>
    
    {{-- <script src="{{URL::asset('assets/js/widgets.js')}}"></script> --}}

    <script src="{{URL::asset('vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{URL::asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{URL::asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>

    <script src="{{ URL::asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/init-scripts/data-table/datatables-init.js') }}"></script>
    <script src="{{ URL::asset('vendors/chart.js/dist/Chart.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/init-scripts/chart-js/chartjs-init.js') }}"></script>
    <script src="{{ URL::asset('vendors/chosen/chosen.jquery.min.js') }}"></script>
    <script src="{{ URL::asset('vendors/notify/js/notify.js') }}"></script>


    @include('components.script_product_master')
    @include('components.script_location_master')
    @include('components.script_gua')
    
    @if ($page == 'dashboard_consumer')
        @include('components.script_dashboard')
    @endif
    
    @if ($page =='product_consumer')
        @include('components.script_stat_product')
    @endif
    
    @if ($page =='location_consumer')
        @include('components.script_stat_location')
    @endif

    @if ($page =='location_consumer_ktp')
        @include('components.script_stat_location_ktp')
    @endif

    @if ($page =='location_consumer_ncp')
        @include('components.script_stat_location_ncp')
    @endif

    @if ($page =='location_consumer_ss')
        @include('components.script_stat_location_ss')
    @endif

    @if ($page =='location_consumer_event')
        @include('components.script_stat_location_event')
    @endif

    @if ($page =='location_consumer_121')
        @include('components.script_stat_location_121')
    @endif


</body>

</html>