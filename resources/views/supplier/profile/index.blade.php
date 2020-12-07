@extends('layouts.app')


@section('content')
<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
         <!--Begin:: App Aside Mobile Toggle-->
         <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
            <i class="la la-close"></i>
        </button>
        <!--End:: App Aside Mobile Toggle-->
        <div style="display: flex;flex-direction:column">
               <!--Begin:: App Aside-->
        <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">
            <div class="kt-portlet kt-portlet--height-fluid-">
                <div class="kt-portlet__body">
                    <div class="kt-widget kt-widget--user-profile-4">
                        <div class="kt-widget__head">
                            <div class="kt-widget__media">
                                <!--Product Image-->
                                <img id="AsidePhoto" class="kt-widget__img " src="{{asset('/images/product.png')}}" style="object-fit: cover" alt="image">
                            </div>
                            <div class="kt-widget__content">
                                <div class="kt-widget__section">
                                    <a href="#" class="kt-widget__username" id="product_name">
                                  name
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="kt-widget__body">
                            <a id="cmdPersonalInfo" data-target="PersonalInfo" class="cmdPage kt-widget__item kt-widget__item--active">المعلومات الشخصية</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End:: App Aside-->

git        </div>

        <!--Begin:: App Content-->
        <div class="kt-grid__item kt-grid__item--fluid kt-app__content mr-10">
            <div class="row">
                <div class="col-xl-12">
                  content
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('styles')

@endpush

@push('scripts')
<script>
    $(function(){
        let Offcanvas = new KTOffcanvas('kt_user_profile_aside',{
                overlay:true,
                baseClass:'kt-app__aside',
                closeBy:'kt_user_profile_aside_close',
                toggleBy:'kt_subheader_mobile_toggle',
            });
        //commands
        let cmdPersonalInfo = $("#cmdPersonalInfo");

        // sections
        let PersonalInfo = $("#PersonalInfo");
        // forms
        let FormPersonalInfo = PersonalInfo.find('form');
        //hide sections

        //functions
        function hideAll(){
            //product type
            if(cmdPersonalInfo.hasClass("kt-widget__item--active")) {
                cmdPersonalInfo.removeClass("kt-widget__item--active");
                PersonalInfo.slideUp(1000);
            }


        }


        //events
        $(".cmdPage").on("click",function (e) {
                Offcanvas.hide();
                if($(this).hasClass("kt-widget__item--active"))return false;
                hideAll();
                window.location.hash = $(this).attr("data-target");
                $("#"+$(this).attr("data-target")).slideDown(1000);
                $(this).addClass("kt-widget__item--active");
                window.scrollTo(0, 0);
        });

    });
</script>
@endpush
