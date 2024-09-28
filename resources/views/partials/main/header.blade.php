<div class="header-wrapper">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid d-flex justify-content-center align-items-center">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('assets/img/custom/icon.webp') }}" alt="Logo" style="height: 50px;">
                <span class="ms-3" style="font-size: 1.25rem; font-weight: bold; color: #fff;">Cahaya Graha
                    Perkasa</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ $currentRoute == 'beranda' ? 'active' : '' }}"
                            href="{{ route('beranda') }}">{{ __('messages.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $currentRoute == 'why-us' ? 'active' : '' }}"
                            href="{{ $currentRoute != 'beranda' ? route('beranda') . '#whyUs' : '#whyUs' }}">
                            {{ __('messages.why_us') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $currentRoute == 'our-product' ? 'active' : '' }}"
                            href="{{ $currentRoute != 'beranda' ? route('beranda') . '#ourProduct' : '#ourProduct' }}">{{
                            __('messages.our_product') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $currentRoute == 'contact' ? 'active' : '' }}"
                            href="{{ $currentRoute != 'beranda' ? route('beranda') . '#contactUs' : '#contactUs' }}">{{
                            __('messages.contact') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array($currentRoute, ['blog', 'blog.detail']) ? 'active' : '' }}"
                            href="{{ route('blog') }}">{{ __('messages.blog') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-bold" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ __('messages.select_language') }}" alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="javascript:void(0);" onclick="setLanguage('id')"><img
                                        src="/assets/img/custom/header/flag_indonesian.svg" alt="" height="15px">
                                    &nbsp;{{
                                    __('messages.indonesia') }}
                                </a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);" onclick="setLanguage('en')"><img
                                        src="/assets/img/custom/header/england_flag.svg" alt="" height="15px"> &nbsp;{{
                                    __('messages.english') }}</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>