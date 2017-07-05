
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    {!! Html::style('css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    {!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}

    <!-- Theme style -->
    {!! Html::style('css/AdminLTE.min.css') !!}

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    {!! Html::style('css/skins/_all-skins.min.css') !!}

    <!-- Morris chart -->
    {!! Html::style('plugins/morris/morris.css') !!}

    <!-- jvectormap -->
    {!! Html::style('plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}
    <!-- Date Picker -->
    {!! Html::style('plugins/datepicker/datepicker3.css') !!}

    <!-- Daterange picker -->
    {!! Html::style('plugins/daterangepicker/daterangepicker.css') !!}
    <!-- bootstrap wysihtml5 - text editor -->
    {!! Html::style('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @stack('stylesheets')
    @stack('scripts.header')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('partials._headerAdmin')
    <!-- Left side column. contains the logo and sidebar -->
    @include('partials._menuAdmin')

    <div class="content-wrapper">
        <br/>
        {{--@include('partials._updatedInfos')--}}
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2017 <a href="#">Clean Net - MIT</a>.</strong> All rights
        reserved.
    </footer>


</div>
<!-- ./wrapper -->
<!-- jQuery 3.1.1 -->
{!! Html::script('js/jquery-3.1.1.min.js') !!}
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
{!! Html::script('js/bootstrap.min.js') !!}
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
{!! Html::script('plugins/morris/morris.min.js') !!}
<!-- Sparkline -->
{!! Html::script('plugins/sparkline/jquery.sparkline.min.js') !!}
<!-- jvectormap -->
{!! Html::script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
<!-- jQuery Knob Chart -->
{!! Html::script('plugins/knob/jquery.knob.js') !!}

<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
{!! Html::script('plugins/daterangepicker/daterangepicker.js') !!}

<!-- datepicker -->
{!! Html::script('plugins/datepicker/bootstrap-datepicker.js') !!}


{!! Html::script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}

<!-- Slimscroll -->
{!! Html::script('plugins/slimScroll/jquery.slimscroll.min.js') !!}

<!-- FastClick -->
{!! Html::script('plugins/fastclick/fastclick.js') !!}

{!! Html::script('js/pages/dashboard.js') !!}


{!! Html::script('plugins/datatables/jquery.dataTables.min.js') !!}

{!! Html::script('plugins/datatables/dataTables.bootstrap.min.js') !!}

<!-- AdminLTE App -->
{!! Html::script('js/adminlte.min.js') !!}

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
{!! Html::script('script/demo.js') !!}

<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
@stack('scripts')
</body>
</html>

