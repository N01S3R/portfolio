    <!-- Bootstrap tether Core JavaScript -->
    {!! Html::script('https://code.jquery.com/jquery-3.6.0.min.js') !!}
    {!! Html::script(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')) !!}
    {!! Html::script(asset('assets/js/bootstrap.bundle.min.js')) !!}
    
    <!--This page JavaScript -->

    {{-- {!! Html::script('assets/vendors/apexcharts/apexcharts.js') !!} --}}
    {!! Html::script(asset('assets/js/pages/dashboard.js')) !!}
    {!! Html::script(asset('assets/js/main.js')) !!}
    {{-- {!! Html::script(asset('assets/js/pages/horizontal-layout.js')) !!} --}}
    {!! Html::script('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js') !!}
    <!--Custom JavaScript -->
    <script>
        setInterval(() => {
            $.ajax({
                type: "POST",
                url: "{{ route('user.resource') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#ajaxUserModel').html("Edit User");
                    $('#ajax-user-model').modal('show');
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#user_name').val(res.user_name);
                    $('#email').val(res.email);
                }
            });
        }, 1000);
        
    </script>    
    @yield('js')
    @stack('js')