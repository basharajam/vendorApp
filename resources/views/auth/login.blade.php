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
    <style type="text/css">
       input{
        text-align: left !important ;
       }
    </style>
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
        <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row-reverse  justify-content-center flex-column-fluid bg-white" id="kt_login">
            <!--begin::Aside-->
            <div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden">
                <!--begin: Aside Container-->
                <div class="d-flex flex-column-fluid flex-column justify-content-between">

                    <!--begin::Aside body-->
                    <div class="d-flex flex-column-fluid flex-column align-items-center">
                        <!--begin::Signin-->
                        <div class="login-form login-signin py-11 pl-6 pr-6">
                            <!--begin::Form-->
                            @include('auth.components.login_form')
                            <!--end::Form-->
                        </div>
                        <!--end::Signin-->


                    </div>
                    <!--end::Aside body-->

                </div>
                <!--end: Aside Container-->
            </div>
            <!--begin::Aside-->

        </div>
        <!--end::Login-->
    </div>

    <script src="{{ asset('/js/plugins.bundle.js') }}"></script>
    <script src="{{ asset('/js/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('/js/login.js') }}"></script>
    <script>
        let content="{{ __(session('message')) }}";
        let status =" {{ session('status') }}";
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        if(content!=''){
            if(status==true){
             toastr.success(content);
            }else{
                toastr.error(content);
            }

        }



        $(document).on('click','.LangSelectorBut',function(){


            $('.langSelList').toggleClass('display')

        })


    </script>
</body>
</html>
