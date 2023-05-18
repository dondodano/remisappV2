<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>{{ isset($title) ? $title : 'REMIS' }}</title>
    <meta name="description" content="Southern Philippines and Marine and Aquatic School of Technology REMIS" />
    <meta name="description" content="SPAMAST REMIS" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @vite('resources/css/app.css')
    @stack('topComponents')
</head>
<body>

    @yield('contents')

    @stack('bodyComponents')
</body>
</html>
