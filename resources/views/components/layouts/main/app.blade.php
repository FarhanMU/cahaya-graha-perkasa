<!doctype html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <!-- SEO Meta Tags -->
    <title>{{ $currentRoute }}</title> <!-- Dynamic title based on the route -->
    <meta name="description" content="{{ $metaDescription ?? 'Default description if not provided' }}" />
    <meta name="keywords" content="{{ $metaKeywords ?? 'default, keywords' }}" />
    <meta name="author" content="{{ $metaAuthor ?? 'Your Company Name' }}" />
    <meta name="robots" content="index, follow" />

    <!-- Open Graph Meta Tags (Untuk Social Media Sharing) -->
    <meta property="og:title" content="{{ $metaOgTitle ?? $currentRoute }}" />
    <meta property="og:description" content="{{ $metaOgDescription ?? $metaDescription }}" />
    <meta property="og:image" content="{{ asset($metaOgImage ?? 'path/to/default-image.jpg') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $metaTwitterTitle ?? $currentRoute }}" />
    <meta name="twitter:description" content="{{ $metaTwitterDescription ?? $metaDescription }}" />
    <meta name="twitter:image" content="{{ asset($metaTwitterImage ?? 'path/to/default-image.jpg') }}" />

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