<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Allura&family=Almarai:wght@300;400;700;800&family=Inter:wght@300;400;500;600;700;800;900&family=Quicksand:wght@300;400;500;600;700&family=Roboto:ital,wght@1,500&family=Tajawal:wght@300;400;500;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('userarea') }}/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('userarea') }}/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('userarea') }}/css/styles.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>{{ setting('title') }}</title>
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>

</head>

<body style="direction: {{ lang('ar') ? '' : 'ltr' }}">
    <header>
        <nav style="direction:rtl" class="navbar navbar-expand navbar-dark bg-primary align-items-center">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center gap-4">
                        <li class="nav-item dropdown language text-light">
                            @if (lang('ar'))
                                <a href="{{ route('lang', 'en') }}" class="nav-link text-light ms-3">English</a>
                            @else
                                <a href="{{ route('lang', 'ar') }}" class="nav-link text-light ms-3">العربية</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a target="_blank" href="{{ setting('instagram') }}" class="nav-link upper-nav-link"><img
                                    src="{{ asset('userarea') }}/assets/header/instagram.svg" alt="instagram" /></a>
                        </li>
                        <li class="nav-item">
                            <a target="_blank" href="{{ setting('facebook') }}" class="nav-link upper-nav-link"><img
                                    src="{{ asset('userarea') }}/assets/header/facebook.svg" alt="facebook" /></a>
                        </li>
                        <li class="nav-item">
                            <a target="_blank" href="{{ setting('youtube') }}" class="nav-link upper-nav-link"><img
                                    src="{{ asset('userarea') }}/assets/header/youtube.svg" alt="youtube" /></a>
                        </li>
                    </ul>
                </div>
                <a target="_blank" href="https://wa.me/{{ setting('whatsapp') }}" class="navbar-brand number">
                    {{ setting('whatsapp') }}
                    <span class="whatsapp-icon mx-3">
                        <img src="{{ asset('userarea') }}/assets/header/whatsapp.svg" alt="whatsapp-icon" />
                    </span>
                </a>
            </div>
        </nav>
        <nav id="navbar" class="navbar navbar-expand-lg">
            <div class="container lower-nav-container align-items-center">
                <a class="navbar-brand navBrand" href="{{ route('home') }}"><img src="{{ setting('logo') }}"
                        alt="" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title small-screen-logo" id="offcanvasNavbarLabel">
                            <img class="small-screen-logo" src="{{ asset('userarea') }}/assets/hero/logo.png"
                                alt="" />
                        </h5>
                        <button type="button" class="btn-close pe-5" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-start flex-grow-1 pe-3 gap-3 lower-nav">
                            <li class="nav-item">
                                <a class="nav-link fw-bold {{ Route::currentRouteName() == 'home' ? 'active-link' : '' }}"
                                    aria-current="page" href="{{ route('home') }}">{{ __('dash.home') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold {{ Route::currentRouteName() == 'categories' ? 'active-link' : '' }}"
                                    href="{{ route('categories') }}">{{ __('dash.categories') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold {{ Route::currentRouteName() == 'about_us' ? 'active-link' : '' }}"
                                    href="{{ route('about_us') }}">
                                    {{ __('dash.about_us') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold {{ Route::currentRouteName() == 'contact_us' ? 'active-link' : '' }}"
                                    href="{{ route('contact_us') }}">{{ __('dash.contact_us') }}</a>
                            </li>
                        </ul>
                        @auth
                            <a href="{{ route('profile') }}"
                                class="btn btn-primary btn-login">{{ __('dash.profile') }}</a>
                        @else
                            <a href="{{ route('login_page') }}"
                                class="btn btn-primary btn-login">{{ __('dash.login') }}</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer>
        <div class="footer-container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <h3 class="footer-heading">{{ __('dash.about_us') }}</h3>
                    <div class="footer-logo-box">
                        <img src="{{ asset(setting('footer_logo')) }}" alt="logo" />
                    </div>
                    <p class="footer-about-text">
                        {{ setting('footer_paragraph_'.lang()) }}
                    </p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h3 class="footer-heading">{{ __('dash.Quick links') }}</h3>
                    <ul class="footer-links p-0">
                        <li><a href="{{ route('home') }}">{{ __('dash.home') }}</a></li>
                        <li><a href="{{ route('categories') }}">{{ __('dash.categories') }}</a></li>
                        <li><a href="{{ route('about_us') }}">{{ __('dash.about_us') }}</a></li>
                        <li><a href="{{ route('contact_us') }}">{{ __('dash.contact_us') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h3 class="footer-heading">{{ __('dash.call_us') }}</h3>
                    <ul class="footer-contact p-0">
                        <li>
                            <span style="margin-right: 6px;">
                                <img src="{{ asset('userarea') }}/assets/footer/location.svg"
                                    alt="" />
                            </span>{{ setting('address') }}
                        </li>
                        <li>
                            <a target="_blank" href="mailto:{{ setting('email') }}">
                                <span style="margin-right: 6px;"><img src="{{ asset('userarea') }}/assets/footer/emai.svg"
                                        alt="" /></span>
                                {{ setting('email') }}
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="whatsapp://send?phone={{ setting('whatsapp') }}">
                                <span style="margin-right: 6px;"><img src="{{ asset('userarea') }}/assets/footer/phone.svg"
                                        alt="" /></span>
                                {{ setting('whatsapp') }}
                            </a>
                        </li>
                        <li>
                            <a class="social-link" target="_blank" href="{{ setting('instagram') }}"><img
                                    src="{{ asset('userarea') }}/assets/footer/instagram.svg" alt="" /></a>
                            <a class="social-link" target="_blank" href="{{ setting('facebook') }}"><img
                                    src="{{ asset('userarea') }}/assets/footer/facebook.svg" alt="" /></a>
                            <a class="social-link" target="_blank" href="{{ setting('youtube') }}"><img
                                    src="{{ asset('userarea') }}/assets/footer/youtube.svg" alt="" /></a>
                            <a class="social-link" target="_blank" href="https://wa.me/{{ setting('whatsapp') }}"><img
                                    src="{{ asset('userarea') }}/assets/footer/whatsapp.svg" alt="" /></a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr />
            <p class="copyrights" style="direction: ltr">
                ©
                All copy rights reserved to Alwaseet line Powered By
                <span><a class="text-white" target="_blank" href="https://emcan-group.com/en">Emcan</a></span>
            </p>
        </div>
    </footer>
    <!-- ***************************************************************************************** -->
    <!-- ***************************************************************************************** -->
    <script src="{{ asset('userarea') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('userarea') }}/js/script.js"></script>

    @yield('js')
</body>

</html>
