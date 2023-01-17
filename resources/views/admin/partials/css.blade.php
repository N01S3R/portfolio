    <!--favicon-->
    {{-- {!! Html::favicon(asset('assets/images/favicon-32x32.png')) !!} --}}
    <!-- Custom CSS -->
    {!! Html::style(asset('assets/css/bootstrap.css')) !!}
    {!! Html::style(asset('assets/vendors/iconly/bold.css')) !!}
    {!! Html::style(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')) !!}
    {!! Html::style(asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')) !!}    
    {!! Html::style(asset('assets/css/app.css')) !!}
    <!-- Lobibox -->
    {!! Html::style(asset('assets/css/lobibox.min.css')) !!}
    <!-- DataTables -->
    {!! Html::style(asset('assets/css/datatable.css')) !!}
    @yield('css')
    @stack('css')