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
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.22/datatables.min.css"/> --}}
    @toaster
        <style>

    /* The message box is shown when the user clicks on the password field */
#strong_container {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  margin-top: 10px;

}

#strong_container p {
  padding: 10px 10px;
  font-size: 16px;
  margin-bottom: 0px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:after {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:after {
  position: relative;
  left: -35px;
  content: "✖";
}
        </style>
    @stack('styles')
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
                            <form class="form" class="w-100" method="POST" action="{{ route('supplier_registeration') }}" id="supplier_registeration_form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="role" value="{{ \App\Constants\UserRoles::SUPPLIER }}">
                                   <!--begin::Title-->
                                    <div class="text-center pb-8">
                                        <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">إنشاء حساب جديد</h2>
                                        <p class="text-muted font-weight-bold font-size-h4">الرجاء ادخال المعلومات التالية لإنشاء حساب جديد</p>
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
            <!--begin::Content-->
            <div class="content order-1 order-lg-2 d-flex flex-column w-100 pb-0" style="background-color: #B1DCED;">
                <!--begin::Title-->
                <div class="d-flex flex-column justify-content-center text-center align-items-center pt-lg-40 pt-md-5 pt-sm-5 px-lg-0 pt-5 px-7">
                    <img style="width:100px;height:100px" src="{{ asset('/images/logo.png') }}">
                     <h3 class="display4 font-weight-bolder my-7 text-dark" style="color: #986923;">نظام موردين</h3>
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

        <!--begin::Global Config(global config for global JS scripts)-->
        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="{{ asset('/js/plugins.bundle.js') }}"></script>
        <script src="{{ asset('/js/prismjs.bundle.js') }}"></script>
        <script src="{{ asset('/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('plugins/dropzone/dist/dropzone.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" rel="stylesheet" />
    <script>
        $(function(){
            $("#cateogiresSelector").select2({
                dir: "rtl",
            });
            $("#CountriesSelector").select2({
                dir: "rtl",
            });
        })
    </script>

    @stack('scripts')
</body>
</html>

