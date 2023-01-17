    <!--favicon-->
    {!! Html::favicon(asset('assets/images/favicon-32x32.png')) !!}
    <!-- Custom CSS -->
    {!! Html::style(asset('assets/css/bootstrap.css')) !!}
    {!! Html::style(asset('assets/vendors/iconly/bold.css')) !!}
    {!! Html::style(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')) !!}
    {!! Html::style(asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')) !!}
    {!! Html::style(asset('assets/css/app.css')) !!}
    {!! Html::style(asset('https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css')) !!}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .layout-horizontal .header-top .logo img {
            display: block;
        }

        body {
            background-image: url('/storage/images/bg.jpg');
            background-repeat: no-repeat, repeat;
            background-color: #cccccc;
        }
    </style>
    @yield('css')
    @stack('css')
