<!DOCTYPE html>
<html class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="/css/app.css" rel="stylesheet" type="text/css" />
    <script defer src="/js/app.js"></script>
</head>

<body class="h-100">
    <div id="app" class="bg-light h-100">
        @csrf
        <topmenu></topmenu>
        <b-container class="bg-white shadow-sm">
            <div class="px-3 py-3">
                @yield('content')
            </div>
        </b-container>
    </div>
</body>

</html>