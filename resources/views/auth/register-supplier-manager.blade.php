<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
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
</head>

<body id="kt_body" style="background-image: url(/metronic/theme/html/demo2/dist/assets/media/bg/bg-10.jpg)" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
            <!--begin::Aside-->
            <div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden" style="max-width:900px;">
                <!--begin: Aside Container-->
                <div class="d-flex flex-column-fluid flex-column justify-content-between py-7 px-7 py-lg-7 px-lg-7 w-100">
                    <!--begin::Logo-->
                    <a href="#" class="text-center pt-2">
                        <img src="{{ asset('images/logo.png') }}" class="max-h-75px" alt="" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Aside body-->
                    <div class="d-flex flex-column-fluid flex-column flex-center">
                        <!--begin::Signup-->
                        <div class="w-100">
                            <!--begin::Form-->
                            @include('auth.components.supplier-manager-registeration-form')
                            <!--end::Form-->
                        </div>
                        <!--end::Signup-->
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
                    <img style="width:100px;height:100px" src="{{ asset('/images/logo.png') }}">
                     <h3 class="display4 font-weight-bolder my-7 text-dark" style="color: #986923;">Vendor System</h3>
                    <p class="font-weight-bolder font-size-h2-md font-size-lg text-dark opacity-70">Some Text Here                    <br />Web Application & Advanced Solutions</p>
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

    <script src="{{ asset('js/plugins.bundle.js') }}"></script>
    <script src="{{ asset('js/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('plugins/dropzone/dist/dropzone.js') }}"></script>
    @stack('scripts')
</body>
</html>

