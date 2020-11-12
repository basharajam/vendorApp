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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins.bundle.css') }}" rel="stylesheet">
    @toaster
</head>

<body class="page-loading" >
    <div id="app">
    <div class="notifications" style="width: 300px; top: 0px; right: 0px;"><span></span></div>
    <x-layout.header-mobile></x-layout.header-mobile>
        <div class="kt-grid kt-grid--hor kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                    <x-layout.header></x-layout.header>
                    <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
                      <div class="kt-content" id="kt_content">

                        @yield('content')
                      </div>
                  </div>
                    <x-layout.footer></x-layout.footer>
                </div>
            </div>
          </div>
    </div>


    <script>
        var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#374afb",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"],
            },
        },
        "host": "http://127.0.0.1:8000/"
    };
    </script>
     <script src="{{ asset('/js/plugins.bundle.js') }}"></script>
     <script src="{{ asset('/js/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('/js/toastr.js') }}"></script>
    <script>
        $(function(){
            $(document).on('click','.delete',function(e){
                e.preventDefault();
                let $this = $(this);
                let action = $this.attr('data-action-name');
                let id = $this.attr('id');
                console.log(id);
                Swal.fire({
                    title: "هل انت متأكد؟",
                    text: "لن تستطيع التراجع عن هذه العملية",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "حذف",
                    cancelButtonText: "إلفاء"
                }).then(function(result) {
                    if(result.value){
                    var tr = "tr#" + id;
                    console.log(tr);
                    var url = action;
                    $.ajax({
                        type: "get",
                        url: url,
                        success: function (data) {
                            toastr.options.progressBar = true;
                                toastr.success('تم حذف المادة بنجاح');
                                $(tr).css({
                                    "display": "none"
                                });
                        },
                        error: function () {
                                toastr.options.progressBar = true;
                                toastr.error('لقد حدث خطأ ما الرجاء المحاولة لاحقاً');
                        }
                     });
                    }

                });
            });

        })
    </script>
    @stack('scripts')
</body>
</body>
</html>
