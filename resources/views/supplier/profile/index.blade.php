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
        <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside" @if($profile->national_id_image==null && $profile->passport_image==null && $profile->visa_image==null) style="display:none" @endif>
            <div class="kt-portlet kt-portlet--height-fluid-">
                <div class="kt-portlet__body">
                    <div class="kt-widget kt-widget--user-profile-4">
                        @if($profile->national_id_image!=null)
                        <div class="kt-widget__head">
                            <div class="kt-widget__content">
                                <div class="kt-widget__section">
                                    <a href="#" class="kt-widget__username" id="product_name">
                                  {{__("صورة عن البطاقة الشخصية")}}
                                    </a>
                                </div>
                            </div>
                            <div class="kt-widget__media">
                                <!--Product Image-->
                                <img id="AsidePhoto" class="kt-widget__img " src="{{$profile->national_id_image->getFullUrl()}}" style="object-fit: cover" alt="image">
                            </div>

                        </div>
                        @endif
                        @if($profile->passport_image!=null)
                        <div class="kt-widget__head">
                            <div class="kt-widget__content">
                                <div class="kt-widget__section">
                                    <a href="#" class="kt-widget__username" id="product_name">
                                     {{__("صورة عن جواز السفر")}}
                                    </a>
                                </div>
                            </div>
                            <div class="kt-widget__media">
                                <!--Product Image-->
                                <img id="AsidePhoto" class="kt-widget__img " src="{{$profile->passport_image->getFullUrl()}}" style="object-fit: cover" alt="image">
                            </div>

                        </div>
                        @endif
                        @if($profile->visa_image!=null)
                        <div class="kt-widget__head">
                            <div class="kt-widget__content">
                                <div class="kt-widget__section">
                                    <a href="#" class="kt-widget__username" id="product_name">
                                        {{__("صورة عن بطاقة التأشيرة الصينية")}}
                                    </a>
                                </div>
                            </div>
                            <div class="kt-widget__media">
                                <!--Product Image-->
                                <img id="AsidePhoto" class="kt-widget__img " src="{{$profile->visa_image->getFullUrl()}}" style="object-fit: cover" alt="image">
                            </div>

                        </div>
                        @endif
                        @if($profile->commercial_license_image!=null)
                        <div class="kt-widget__head">
                            <div class="kt-widget__content">
                                <div class="kt-widget__section">
                                    <a href="#" class="kt-widget__username" id="product_name">
                                 {{__("صورة الرخصة التجارية")}}
                                    </a>
                                </div>
                            </div>
                            <div class="kt-widget__media">
                                <!--Product Image-->
                                <img id="AsidePhoto" class="kt-widget__img " src="{{$profile->commercial_license_image->getFullUrl()}}" style="object-fit: cover" alt="image">
                            </div>

                        </div>
                        @endif
                        @if($profile->company_logo_image!=null)
                        <div class="kt-widget__head">
                            <div class="kt-widget__content">
                                <div class="kt-widget__section">
                                    <a href="#" class="kt-widget__username" id="product_name">
                                 {{__("صورة العلامة التجارية الخاصة بالشركة")}}
                                    </a>
                                </div>
                            </div>
                            <div class="kt-widget__media">
                                <!--Product Image-->
                                <img id="AsidePhoto" class="kt-widget__img " src="{{$profile->company_logo_image->getFullUrl()}}" style="object-fit: cover" alt="image">
                            </div>

                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--End:: App Aside-->

   </div>

        <!--Begin:: App Content-->
        <div class="kt-grid__item kt-grid__item--fluid kt-app__content mr-10">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            @include('supplier.profile.components.preview_card', ['profile', $profile])
                            @include('supplier.profile.components.rest_password',['profile',$profile])
                            @include('supplier.profile.components.edit_card', ['profile', $profile])

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('styles')

@endpush

@push('scripts')
<!-- By Blaxk -->
<!-- Fetch password Sent Error --> 
@if (session('done'))
    <script>
         toastr.success('{{__("تم ارسال الطلب بنجاح")}}')
    </script>
@endif


<script>




    //
    $(function(){
        let Offcanvas = new KTOffcanvas('kt_user_profile_aside',{
                overlay:true,
                baseClass:'kt-app__aside',
                closeBy:'kt_user_profile_aside_close',
                toggleBy:'kt_subheader_mobile_toggle',
            });
        //commands
        let cmdPersonalInfo = $("#cmdPersonalInfo");
        let cmdEditCard = $("#cmdEditCard");

        // sections
        let PersonalInfo = $("#PersonalInfo");
        let EidtCard=$("#EditCard");
        // forms
        let FormPersonalInfo = PersonalInfo.find('form');
        let FormEditCard = EidtCard.find('form');
        //hide sections
            EidtCard.hide();
        //functions
        function hideAll(){
            //product type
            if(cmdPersonalInfo.hasClass("kt-widget__item--active")) {
                cmdPersonalInfo.removeClass("kt-widget__item--active");
                PersonalInfo.slideUp(1000);
            }
            if(cmdEditCard.hasClass("kt-widget__item--active")) {
                cmdEditCard.removeClass("kt-widget__item--active");
                EidtCard.slideUp(1000);
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


        //By Blaxk
        $("#hideEditCard").on('click',function(e){
            Offcanvas.hide();
            hideAll();
        })

    });
</script>
@endpush
