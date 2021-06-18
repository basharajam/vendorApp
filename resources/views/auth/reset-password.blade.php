<!doctype html>
@if (app()->getLocale() ==="ar")
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
@endif

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--ICON-->
    <link rel="icon" href="<%= BASE_URL %>favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flag-icon.min.css') }}" rel="stylesheet">
</head>

<body id="kt_body" style="background-image: url(/metronic/theme/html/demo2/dist/assets/media/bg/bg-10.jpg)" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
    <div class="d-flex flex-column flex-root">
        <div class="langSelector">
            <button id='LangSelectorBut' class="LangSelectorBut"  >
                
                @if (app()->getLocale() ==="ar")
                 <span class="flag-icon flag-icon-sa"></span>
                @endif
                @if (app()->getLocale() ==="en")
                 <span class="flag-icon flag-icon-us"></span>
                @endif
                @if (app()->getLocale() ==="ch")
                 <span class="flag-icon flag-icon-cn"></span>
                @endif
            </button>
            <ul class="langSelList" >
                <li>
                    <a href="{{ route('setLangEn') }}"><span class="flag-icon flag-icon-us"> </span> English </a>
                </li>
                <li>
                    <a href="{{ route('setLangAr') }}"><span class="flag-icon flag-icon-sa"></span>   العربية </a></li>
                <li>
                    <a href="{{ route('setLangCh') }}"><span class="flag-icon flag-icon-cn"></span>   中文 </a></li>
            </ul>
        </div>
        <!--begin::Login-->
        <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row-reverse   flex-column-fluid bg-white" id="kt_login">
            <!--begin::Aside-->
            <div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden">
                <!--begin: Aside Container-->
                <div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-13 px-lg-35">

                    <!--begin::Aside body-->
                    <div class="d-flex flex-column-fluid flex-column ">
                        <!--begin::Forgot-->
                        <div class="login-form login-signin  pt-11">
                            <!--begin::Form-->
                            @include('auth.components.reset_password_form')

                            <!--end::Form-->
                        </div>
                        <!--end::Forgot-->
                    </div>
                    <!--end::Aside body-->

                </div>
                <!--end: Aside Container-->
            </div>
            <!--begin::Aside-->
            <!--begin::Content-->
            <div class="content order-1 order-lg-2 d-flex flex-column w-100 pb-0" style="background-color: #B1DCED;">
                <!--begin::Title-->
                <div class="d-flex flex-column justify-content-center text-center align-items-center pt-lg-40 pt-md-5 pt-sm-5 px-lg-0 pt-5 px-7">
                    <img src="{{ asset('images/logo.png') }}" class="max-h-200px max-w-200px text-center" alt="" />
                    <h3 class="display4 font-weight-bolder my-7 text-dark" style="color: #986923;">نظام الموردين</h3>
                </div>
                <!--end::Title-->
                <!--begin::Image-->
                <div class="content-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url({{ asset('/images/login-visual-2.svg') }});"></div>
                <!--end::Image-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>

    <script src="{{ asset('/js/plugins.bundle.js') }}"></script>
    <script src="{{ asset('/js/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('/js/login.js') }}"></script>
    <script>
                $(document).on('click','.LangSelectorBut',function(){


                    $('.langSelList').toggleClass('display')

                })
    </script>
</body>
</html>

