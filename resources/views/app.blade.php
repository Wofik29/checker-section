@php
    $config = [
        'appName' => env('APP_NAME'),
        'docs' => env('APP_DOCS'),
        'locale' => $locale = app()->getLocale(),
        'locales' => config('app.locales'),
        'is_auth' => Auth::check(),
        'guideo_domain' => config('app.guideo_domain'),
        'version' => config('app.version'),
        'env' => config('app.env'),
    ];
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }} </title>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
</head>
<body>
<div id="app">
    <app-main/>
</div>


<script>
    window.config = @json($config);
</script>
<script src="{{ mix('/js/app.js')  }}" defer></script>
</body>
</html>
