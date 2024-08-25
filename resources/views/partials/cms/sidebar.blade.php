<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/custom/icon.webp') }}" alt="Logo" style="height: 2em; width: 1.5em">
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Administrator</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <!-- Dashboards -->
        <li class="menu-item {{ $currentRoute == 'dashboard' ? 'active' : '' }} ">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard </div>
            </a>
        </li>

        <!-- Data Beranda -->
        <li
            class="menu-item {{ request()->routeIs('header.*') || request()->routeIs('whyUs.*') || request()->routeIs('ourProduct.*') || request()->routeIs('contactUs.*') || request()->routeIs('socialMedia.*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-home"></i>
                <div data-i18n="Beranda">Beranda</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item  {{ request()->routeIs('header.*') ? 'active' : '' }} ">
                    <a href="/dashboard/header" class="menu-link">
                        <div data-i18n="Header">Header</div>
                    </a>
                </li>
                <li class="menu-item  {{ request()->routeIs('whyUs.*') ? 'active' : '' }} ">
                    <a href="/dashboard/why-us" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-archive"></i>
                        <div data-i18n="Why Us">Why Us</div>
                    </a>
                </li>
                <li class="menu-item  {{ request()->routeIs('ourProduct.*') ? 'active' : '' }} ">
                    <a href="/dashboard/our-product/" class="menu-link">
                        <div data-i18n="Our Product">Our Product</div>
                    </a>
                </li>
                <li class="menu-item  {{ request()->routeIs('contactUs.*') ? 'active' : '' }} ">
                    <a href="/dashboard/contact-us/" class="menu-link">
                        <div data-i18n="Contact Us">Contact Us</div>
                    </a>
                </li>
                <li class="menu-item  {{ request()->routeIs('socialMedia.*') ? 'active' : '' }} ">
                    <a href="/dashboard/social-media" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-archive"></i>
                        <div data-i18n="Social Media">Social Media</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Main Data -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Main Data">Main Data</span>
        </li>
        <li class="menu-item  {{ request()->routeIs('blog.*') ? 'active' : '' }} ">
            <a href="/dashboard/blog" class="menu-link">
                <i class="menu-icon tf-icons ti ti-article"></i>
                <div data-i18n="Blog">Blog</div>
            </a>
        </li>
        <li class="menu-item  {{ request()->routeIs('card.*') ? 'active' : '' }} ">
            <a href="/dashboard/card" class="menu-link">
                <i class="menu-icon tf-icons ti ti-credit-card"></i>
                <div data-i18n="Card">Card</div>
            </a>
        </li>
        <li class="menu-item  {{ request()->routeIs('email.*') ? 'active' : '' }} ">
            <a href="/dashboard/email" class="menu-link">
                <i class="menu-icon tf-icons ti ti-mail"></i>
                <div data-i18n="Email">Email</div>
            </a>
        </li>

    </ul>

</aside>