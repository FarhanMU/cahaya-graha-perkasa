<!doctype html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $currentRoute }}</title>

    <meta name="description" content="" />

    @include('partials.auth.styles') {{-- include all stylesheets --}}
</head>

<body>

    @yield('content')

    @include('partials.auth.scripts') {{-- include all scripts --}}
    @stack('scripts') {{-- load scripts added to the stack --}}


</body>

</html>