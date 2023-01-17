    <!-- Bootstrap tether Core JavaScript -->
    {!! Html::script('https://code.jquery.com/jquery-3.6.0.min.js') !!}
    {!! Html::script(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')) !!}
    {!! Html::script(asset('assets/js/bootstrap.bundle.min.js')) !!}
    <!--This page JavaScript -->
    {!! Html::script(asset('assets/js/main.js')) !!}
    <!--Sweet Alert 2 -->
    {!! Html::script(asset('//cdn.jsdelivr.net/npm/sweetalert2@11')) !!}
    <!--Lobibox -->
    {!! Html::script(asset('assets/js/lobibox.min.js')) !!}
    {!! Html::script(asset('assets/js/jquery.1.11.min.js')) !!}
    <!--Datatables Js -->
    {!! Html::script('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js') !!}
    <!--Custom JavaScript -->
    @yield('js')
    @stack('js')