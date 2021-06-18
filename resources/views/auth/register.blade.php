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

<body id="kt_body" style="background-color:#fff" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
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
        <div class="row">
            <div class="col-12">
                   <!--begin::Login-->
        <div class="login w-100 login-2 login-signin-on d-flex flex-column flex-lg-row-reverse justify-content-center  h-100   flex-column-fluid bg-white" id="kt_login">
            <!--begin::Aside-->
            <div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden w-100">
                <!--begin: Aside Container-->
                <div class="w-100 pr-5 pl-5">
                    <!--begin::Aside body-->
                    <div class="w-90 d-flex justify-content-center">
                        <!--begin::Signin-->
                        <div class="login-form login-signin py-11 w-90">
                           <!--begin::Form-->
                           <div class="d-flex justify-content-center h-100 w-90 pr-10 pl-10" >
                               <div class="row">
                                    <div class="col-12" style="text-align: center">
                                        <div class="text-center pb-8">
                                            <!--begin::Logo-->
                                            <a href="/" class="text-center mb-5 d-block">
                                               <img src="{{ asset('images/logo.png') }}" class="max-h-150px max-w-150px" alt="" />
                                           </a>
                                           <!--end::Logo-->
                                            <h2 class="font-weight-bolder text-dark font-size-h1 font-size-h1-lg mb-10  ">{{__('نظام الموردين')}}</h2>
                                            <h2 class="font-weight-bolder text-dark font-size-h1 font-size-h1-lg mb-10 ">{{__('الرجاء اختيار نوع الحساب')}}</h2>
                                       </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 parent">
                                            <label class="option">
                                                <span class="option-control">
                                                    <span class="radio radio-outline">
                                                        <input type="radio" name="account_type" value="{{ route("supplier_registeration_view") }}">
                                                        <span></span>
                                                    </span>
                                                </span>
                                                <span class="option-label">
                                                    <span class="option-head">
                                                        <span class="option-title">{{__('مورد')}}</span>
                                                        <span class="option-focus"></span>
                                                    </span>
                                                    <span class="option-body">{{__('إنشاء حساب مورد')}}</span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 parent">
                                            <label class="option">
                                                <span class="option-control">
                                                    <span class="radio radio-outline">
                                                        <input type="radio" name="account_type" value="{{ route("supplier_manager_registeration_view") }}">
                                                        <span></span>
                                                    </span>
                                                </span>
                                                <span class="option-label">
                                                    <span class="option-head">
                                                        <span class="option-title">{{__('مدير موردين')}}</span>
                                                        <span class="option-focus"></span>
                                                    </span>
                                                    <span class="option-body">{{__('إنشاء حساب مدير  موردين')}}</span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col-12">
                                            <!--begin::Form group-->
                                            <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                                                <a href="#" id="selected_account_type"   type="button" id="" class="btn btn-dark font-weight-bolder disabled font-size-h6 px-8 py-4 my-3 mx-4" type="button">{{__('التالي')}}</a>
                                            </div>
                                            <!--end::Form group-->
                                        </div>
                                    </div>
                                </div>
                        </div>
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
        </div>

    </div>

    <script src="{{ asset('/js/plugins.bundle.js') }}"></script>
    <script src="{{ asset('/js/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('/js/login.js') }}"></script>
    <script>
        $(function(){
            $("input[name='account_type']").on('change',function(){
                let route = $(this).val();
                $('#selected_account_type').attr('href',route);
                $("#selected_account_type").removeClass('disabled');
               // $("input[name='account_type']").style.border = 0px;
               // $(this).parentsUntil('.parent')[2].style.border = "2px solid black";
               $('.option').removeClass('bold');
               $(this).parentsUntil('.parent')[2].classList.add('bold')
        
            })
        });


        $(document).on('click','.LangSelectorBut',function(){


            $('.langSelList').toggleClass('display')

        })

    </script>
</body>
</html>

