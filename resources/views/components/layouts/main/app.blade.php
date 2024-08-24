<!doctype html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $currentRoute }}</title>

    <meta name="description" content="" />

    @include('partials.main.styles') {{-- include all stylesheets --}}
</head>

<body>

    <script>
        // Fungsi untuk menyimpan bahasa yang dipilih di local storage
        function setLanguage(lang) {
            localStorage.setItem('lang', lang);
            window.location.search = '?lang=' + lang;
        }

        // Fungsi untuk mengambil bahasa dari local storage dan mengatur ulang URL
        function getLanguage() {
            let lang = localStorage.getItem('lang');
            if (lang) {
                let currentUrl = window.location.href;
                if (!currentUrl.includes('?lang=')) {
                    window.location.search = '?lang=' + lang;
                }
            }
        }

        // Panggil fungsi untuk mendapatkan bahasa saat halaman dimuat
        getLanguage();
    </script>

    @if ($currentRoute != 'id-card')
    @include('partials.main.header')
    @endif


    <div style="margin-bottom: 10em">
        @yield('content')
    </div>

    @if ($currentRoute != 'id-card')
    @include('partials.main.footer')
    @endif


    @include('partials.main.scripts') {{-- include all scripts --}}
    @stack('scripts') {{-- load scripts added to the stack --}}


</body>

</html>