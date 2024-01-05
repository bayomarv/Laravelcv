<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <main>
            @include('inc.messages')

            @yield('content')
        </main>
        @include('inc.footer')

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('js/html2canvas.min.js') }}"></script>
        <script src="{{ asset('js/jspdf.umd.js') }}"></script>
        <script src="https://cdn.tiny.cloud/1/09wjt1lo29lrjpazdnyqmmade2jy4v4bq67a2vqgdtms0xnc/tinymce/6/tinymce.min.js" referrerpolicy="origin">
        </script>
        <script src="{{ asset('js/main.js') }}"></script>
        
    </div>
</body>
</html>
