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

    <title>{{ config('app.name', 'VendorSystem') }}</title>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <!--begin::Global Theme Styles(used by all pages)-->
  <link href="{{ asset('/css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/css/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet"> --}}
    {{-- <!-- Styles -->
    <link href="{{ asset('/theme/css/plugins.bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('/theme/css/prismjs.bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('/theme/css/style.bundle.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylehseet">
<link href="{{ asset('plugins/telinput/css/intlTelInput.css') }}" rel="stylesheet"/>

    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.22/datatables.min.css"/> --}}
    @toaster
    <style>
    [dir=rtl] .field-icon {
      position: absolute;
      left: 4%;
      color: #aaa;
      z-index: 2;
    }

    [dir=ltr] .field-icon{
      position: absolute;
      left: 93%;
      color: #aaa;
      z-index: 2;
    }
        /* The message box is shown when the user clicks on the password field */
    #strong_container {
      display:none;
      background: transparent;
      color: #000;
      position: relative;
      margin-top: 10px;

    }

    #strong_container p {
      padding: 10px 10px;
      font-size: 16px;
      margin-bottom: 0px;
    }
    #strong_container h3{
        font-size:14px;
        font-weight: bold;
    }

    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
     direction: ltr;
    }

    .valid:before {
      position: relative;
      content: "✔";
      left: -3px;
    }

    /* Add a red text color and an "x" when the requirements are wrong */
    .invalid {
        direction: ltr;
    }

    .invalid:before {
      position: relative;
      content: "✖";
      left: -3px;
    }
    </style>
    <style>
        #kt_body , html{
            width:100vw !important;
            background-color: #fff;
        }
    </style>
    <link href="{{ asset('css/flag-icon.min.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body id="kt_body" style="" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
  <div class="container-fluid">
    <div class="d-flex flex-column justify-content-center flex-root">
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
            <ul class="langSelList" style="left: 0; margin:20px; margin-top:4px" >
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
        <div class="login login-2 login-signin-on d-flex flex-column justify-content-center flex-lg-row flex-column-fluid bg-white" id="kt_login">
            <!--begin::Aside-->
            <div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden" style="max-width:900px;">
                <!--begin: Aside Container-->
                <div class="d-flex flex-column-fluid flex-column justify-content-between py-7 px-7 py-lg-7 px-lg-7 w-100">
                    <!--begin::Logo-->
                    <span class="text-center pt-2">
                        <img src="{{ asset('images/logo.png') }}" class="max-h-75px" alt="" />
                    </span>
                    <!--end::Logo-->
                    <!--begin::Aside body-->
                    <div class="d-flex flex-column-fluid flex-column flex-center">
                        <!--begin::Signup-->
                        <div class="w-100">
                            <!--begin::Form-->
                            <form class="form" name="supplierForm" class="w-100" method="POST" action="{{ route('supplier_registeration') }}" id="supplier_registeration_form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="role" value="{{ \App\Constants\UserRoles::SUPPLIER }}">
                                   <!--begin::Title-->
                                    <div class="text-center pb-8">
                                        <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{__("إنشاء حساب جديد")}}</h2>
                                        <p class="text-muted font-weight-bold font-size-h4">{{__("الرجاء ادخال المعلومات التالية لانشاء جساب جديد")}}</p>
                                    </div>
                                    <!--end::Title-->
                                @include('auth.components.supplier-registeration-form',['supplier'=>null])
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Signup-->
                    </div>
                    <!--end::Aside body-->

                </div>
                <!--end: Aside Container-->
            </div>

            <!--begin::Aside-->

        </div>
        <!--end::Login-->
    </div>
  </div>

        <!--begin::Global Config(global config for global JS scripts)-->
        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="{{ asset('/js/plugins.bundle.js') }}"></script>
        <script src="{{ asset('/js/prismjs.bundle.js') }}"></script>
        <script src="{{ asset('/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('plugins/dropzone/dist/dropzone.js') }}"></script>

    <script>
     $(document).on('click','.LangSelectorBut',function(){

        $('.langSelList').toggleClass('display')

    })
    </script>
    @stack('scripts')


</body>
</html>

