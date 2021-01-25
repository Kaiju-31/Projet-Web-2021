<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/halfmoon@1.1.1/css/halfmoon-variables.min.css" rel="stylesheet" />
{{--    <link rel="stylesheet" href="style.css">--}}

    <title>@yield('title')</title>
</head>
<body class="dark-mode">
@include('layouts.navbar')


@yield('extra-script')
<script src="https://cdn.jsdelivr.net/npm/halfmoon@1.1.1/js/halfmoon.min.js"></script>
<script src="path/to/halfmoon.js"></script>
<script src="https://kit.fontawesome.com/7c50a0efb9.js" crossorigin="anonymous"></script>
@yield('extra-js')
</body>
</html>
