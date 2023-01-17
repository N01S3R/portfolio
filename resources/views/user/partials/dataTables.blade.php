@push('css')
    {!! Html::style(asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')) !!}
    {{ Html::style(asset('assets/plugins/sweetalert2/dist/sweetalert2.min.css')) }}
@endpush
@push('js')
    {!! Html::script(asset('assets/plugins/datatable/js/jquery.dataTables.min.js')) !!}
    {!! Html::script(asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')) !!}
    {{ Html::script(asset('assets/plugins/sweetalert2/dist/sweetalert2.all.min.js')) }}

    {{ $dataTable->scripts() }}
@endpush