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
                        @if($profile->national_id_image!=null)
                        <div class="kt-widget__head">
                            <div class="kt-widget__content">
                                <div class="kt-widget__section">
                                    <a href="#" class="kt-widget__username" id="product_name">
                                  صورة الهوية
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
                                  صورة جواز السفر
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
                                 صورة التأشيرة الصينية
                                    </a>
                                </div>
                            </div>
                            <div class="kt-widget__media">
                                <!--Product Image-->
                                <img id="AsidePhoto" class="kt-widget__img " src="{{$profile->visa_image->getFullUrl()}}" style="object-fit: cover" alt="image">
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
                            <div class="main-card mb-3 card w-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mr-3">
                                                <!--begin::Name-->
                                                <h4>
                                                    <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h3 font-weight-bold mr-3">{{ $profile->company_name }}
                                                </h4>
                                                <!--end::Name-->
                                                <!--begin::Contacts-->
                                                <div class="d-flex flex-wrap my-2">
                                                    <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                        <!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/Communication/Mail-notification.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"></path>
                                                                <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"></circle>
                                                            </g>
                                                        </svg>
                                                    </span>{{ $profile->email }}</a>
                                                    <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <mask fill="white">
                                                                    <use xlink:href="#path-1"></use>
                                                                </mask>
                                                                <g></g>
                                                                <path d="M7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 Z M12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L15,10 L15,8 C15,6.34314575 13.6568542,5 12,5 Z" fill="#000000"></path>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>{{ $profile->national_number ?? $profile->passport_number }}</a>
                                                    <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-11-19-154210/theme/html/demo7/dist/../src/media/svg/icons/Communication/Call.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M11.613922,13.2130341 C11.1688026,13.6581534 10.4887934,13.7685037 9.92575695,13.4869855 C9.36272054,13.2054673 8.68271128,13.3158176 8.23759191,13.760937 L6.72658218,15.2719467 C6.67169475,15.3268342 6.63034033,15.393747 6.60579393,15.4673862 C6.51847004,15.7293579 6.66005003,16.0125179 6.92202169,16.0998418 L8.27584113,16.5511149 C9.57592638,16.9844767 11.009274,16.6461092 11.9783003,15.6770829 L15.9775173,11.6778659 C16.867756,10.7876271 17.0884566,9.42760861 16.5254202,8.3015358 L15.8928491,7.03639343 C15.8688153,6.98832598 15.8371895,6.9444475 15.7991889,6.90644684 C15.6039267,6.71118469 15.2873442,6.71118469 15.0920821,6.90644684 L13.4995401,8.49898884 C13.0544207,8.94410821 12.9440704,9.62411747 13.2255886,10.1871539 C13.5071068,10.7501903 13.3967565,11.4301996 12.9516371,11.8753189 L11.613922,13.2130341 Z" fill="#000000"/>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                        {{ $profile->mobile_number }} </a>
                                                    <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">

                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000"></path>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>{{ $profile->shop_address }}</a>

                                                </div>
                                                <!--end::Contacts-->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row my-2">
                                                <label class="col-4 col-form-label">اسم البنك:</label>
                                                <div class="col-8">
                                                    <span class="form-control-plaintext font-weight-bolder">{{ $profile->bank_name }}.</span>
                                                </div>
                                            </div>
                                            <div class="form-group row my-2">
                                                <label class="col-4 col-form-label">رقم حساب البنك:</label>
                                                <div class="col-8">
                                                    <span class="form-control-plaintext font-weight-bolder">{{ $profile->bank_account_number }}.</span>
                                                </div>
                                            </div>
                                            <div class="form-group row my-2">
                                                <label class="col-4 col-form-label">اسم صاحب البنك:</label>
                                                <div class="col-8">
                                                    <span class="form-control-plaintext font-weight-bolder">{{ $profile->bank_account_owner_name }}.</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
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
