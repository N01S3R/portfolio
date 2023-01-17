<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Neri') }}</title>
    {!! Html::style('https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css') !!}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    @include('user.partials.css')

</head>

<body>
    <div id="app">
        <div id="sidebar">
            @include('user.partials.sidebar')
        </div>
        <div id="main" class="layout-horizontal">
            @include('user.partials.navbar')
            <div class="content-wrapper container">
                @yield('content')
            </div>
        </div>
        {{-- @include('user.partials.footer') --}}
        @include('user.partials.js')

        {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</body>

</html>
