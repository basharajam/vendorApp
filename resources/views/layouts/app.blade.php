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
    <link href="{{ asset('plugins/telinput/css/intlTelInput.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/toastr.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flag-icon.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.22/datatables.min.css"/> --}}


    <style type="text/css" >
    
    .LangSelectorBut{
        width: 60px;
        height: 40px;
        margin: 6px;
    }

    .langSelList{
        background: #ffffff;
    }

    #LangSelectorBut span{
        font-size: 26px;


    }

    .langSelList ul{
        padding: 4px

    }

    .langSelector ul li a span{
        font-size: 30px;
    }
    .langSelector ul{
        margin: 2px;
    }

    </style>
    <!-- Rtl Style Customize -->
    @if (app()->getLocale() === "ar")

        <style type="text/css">
        
         .kt-menu__nav{
             direction:rtl !important
         };
         table{
             direction: rtl !important;
             text-align: :right !important;
         }
         .langSelector ul li a span{
            font-size: 30px;
             margin-left: 15px;
        }

        </style>

      @yield('Rtlstyle')
          
    @else
          
    <style type="text/css">
        
        table{
            direction: ltr !important;
            text-align: :left !important;
        }

        .langSelector ul li a span{
            font-size: 30px;
             margin-right: 15px;
        }



       </style>

    @endif

    @yield('style')
    @stack('styles')
</head>

<body class="fadeyellow backgroundChanger kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right   kt-subheader--enabled kt-page--loading-enabled kt-page--loading kt-header--minimize-topbar kt-subheader--transparent kt-page--loadin" >
    <div id="app">
        @include('supplier_manager.components.profit_ratio_modal')
    <div class="notifications" style="width: 300px; top: 0px; right: 0px;"><span></span></div>
    @auth
    <x-layout.header-mobile></x-layout.header-mobile>
    @endauth
        <div class="kt-grid kt-grid--hor kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                    @auth
                    <x-layout.header></x-layout.header>
                    @endauth
                    <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body" style="">
                      <div class="kt-content h-100 mt-10" id="kt_content" style="">

                        @yield('content')
                        <div id="push" class="push" style=""> </div>
                      </div>
                  </div>
                    <x-layout.footer></x-layout.footer>
                </div>
            </div>
          </div>
    </div>


    <!--begin::Global Config(global config for global JS scripts)-->
    <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('/js/plugins.bundle.js') }}"></script>
    <script src="{{ asset('/js/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('/js/toastr.min.js') }}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.22/datatables.min.js"></script>

    <script>
        $(function(){

            if($("#kt_content").height() > 600){
                document.getElementById('push').style.height = "0px";
            }
            else{
                document.getElementById('push').style.height = "62px";

            }
            $(document).on('click','.delete',function(e){
                e.preventDefault();
                let $this = $(this);
                let action = $this.attr('data-action-name');
                let type=$this.attr('data-type');
                let varid=$this.attr('data-varid');
                let id = $this.attr('id');
                let  remove =$this.attr('data-remove');
          
                Swal.fire({
                    title: "{{__('???? ?????? ?????????? ??')}}",
                    text: "{{__('???? ???????????? ?????????????? ???? ?????? ??????????????')}}",
                    icon: "??????????",
                    showCancelButton: true,
                    confirmButtonText: "{{__('??????')}}",
                    cancelButtonText: "{{__('??????????')}}"
                }).then(function(result) {
                    if(result.value){
                    var tr = "#" + id;

           
                    var url = action;
                    $.ajax({
                        type: "get",
                        url: url,
                        success: function (data) {
                            toastr.options.progressBar = true;
                        
                                toastr.success('{{__("???? ?????? ???????????? ??????????")}}');
                                $(tr).css({
                                    "display": "none"
                                });
                                $(remove).css({
                                    "display":"none"
                                })
                                

                                if(type ==='variation'){

                                    //Remove Collpase Card
                                    var removeCardId= '.card'+varid
                                    $(removeCardId).remove()
                                }

                                


                        },
                        error: function () {
                                toastr.options.progressBar = true;
                                toastr.error('{{__("?????? ?????? ?????? ???? , ???????????? ???????????????? ????????????")}}');
                        }
                     });
                    }

                });
            });

        })
    </script>
    <script>
        let content="{{ __(session('message')) }}";
        let where = "{{ session('where') }}";
        let status =" {{ session('status') }}";

        let validation_erros_exist = "{{ $errors->any() }}"
        // let validation_errors = "{!! json_encode($errors->all()) !!}";
        if(validation_erros_exist==1){
            let verrors = {!! json_encode($errors->all()) !!};
            for(let i=0;i<verrors.length;i++){
                toastr.error(verrors[i]);
            }
        }

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-center",
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
      
        if(content!=''  && where != 'support' ){
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
    @yield('scripts')
    @stack('scripts')


</body>
</body>
</html>
