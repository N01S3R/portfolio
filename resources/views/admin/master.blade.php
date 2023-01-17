<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    @include('admin.partials.css')
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            @include('admin.partials.sidebar')
        </div>
        <div id="main" class="layout-horizontal">
            @include('admin.partials.navbar')
        </div>
        <div id="main">
            @yield('content')
        </div>
        @include('admin.partials.footer')
        @include('admin.partials.js')
</body>

</html>
