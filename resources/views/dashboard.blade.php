<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('backend/assets/img/favicon.png')}}" rel="icon">
    <link href="{{ asset('backend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{ asset('global_assets/css/custom.css')}}">
    @include('backend.partials.css')

</head>

<body>

    @include('backend.partials.header')

    @include('backend.partials.sidebar')

    <main>
        @yield('content')
    </main>

    @include('backend.partials.footer')

    @include('backend.partials.scripts')

</body>

</html>
