<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI Retribusi Perdagangan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @stack('style')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    @yield('content')
    @stack('scripts')
</body>

</html>
