<!doctype html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - {{ $currentRoute }}</title>

    <meta name="description" content="" />

    @include('partials.cms.styles') {{-- include all stylesheets --}}
</head>

<body>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            @include('partials.cms.sidebar') {{-- include the sidebar --}}


            <div class="layout-page">
                @include('partials.cms.navbar') {{-- include the navbar --}}
                @yield('content')
            </div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>

    @include('partials.cms.scripts') {{-- include all scripts --}}
    @stack('scripts') {{-- load scripts added to the stack --}}


</body>

</html>