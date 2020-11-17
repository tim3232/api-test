<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Test</title>
    @include('layouts.chank.header')
</head>
<body>

@include('layouts.chank.navbar')
@yield('content')

</body>
</html>