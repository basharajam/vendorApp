@extends('layouts.app')

@section('content')

<div class="d-flex flex-column-fluid">
    <div class="container-fluid">
        <div class="card card-custom">
            <!--begin::Body-->
            <div class="card-body">
                <div class="kt-section">
                    <div class="kt-section__content" style="direction: rtl;">
                        <div class="row">
                            <div class="col-12">
                                <div class="w-100">
                                    <!--begin::Name-->
                                    <h4>
                                        <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h3 font-weight-bold mr-3">
                                           <h4>
                                            @if($order->post)
                                            الطلب :   {{ str_replace('wc_order_','',$order->post->meta['_order_key']) }}
                                              @endif
                                    </h4>
                                    @if($order->post)
                                    @switch($order->post->post_status)
                                     @case("wc-cancelled")
                                     <span class="m-2 label font-weight-bold label-lg label-light-danger label-inline">{{ str_replace("wc-","",$order->post->post_status) }}</span>
                                    @break
                                     @case("wc-completed")
                                     <span class="m-2 label font-weight-bold label-lg label-light-success label-inline">{{ str_replace("wc-","",$order->post->post_status) }}</span>
                                     @break
                                     @case("wc-processing")
                                     <span class="m-2 label font-weight-bold label-lg label-light-primary label-inline">{{ str_replace("wc-","",$order->post->post_status) }}</span>
                                     @break
                                    @endswitch
                                   @endif
                                    <!--end::Name-->
                                    <!--begin::Contacts-->
                                    <div class="d-flex flex-wrap my-2">

                                        <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-11-19-154210/theme/html/demo2/dist/../src/media/svg/icons/Code/Time-schedule.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M10.9630156,7.5 L11.0475062,7.5 C11.3043819,7.5 11.5194647,7.69464724 11.5450248,7.95024814 L12,12.5 L15.2480695,14.3560397 C15.403857,14.4450611 15.5,14.6107328 15.5,14.7901613 L15.5,15 C15.5,15.2109164 15.3290185,15.3818979 15.1181021,15.3818979 C15.0841582,15.3818979 15.0503659,15.3773725 15.0176181,15.3684413 L10.3986612,14.1087258 C10.1672824,14.0456225 10.0132986,13.8271186 10.0316926,13.5879956 L10.4644883,7.96165175 C10.4845267,7.70115317 10.7017474,7.5 10.9630156,7.5 Z" fill="#000000"/>
                                                    <path d="M7.38979581,2.8349582 C8.65216735,2.29743306 10.0413491,2 11.5,2 C17.2989899,2 22,6.70101013 22,12.5 C22,18.2989899 17.2989899,23 11.5,23 C5.70101013,23 1,18.2989899 1,12.5 C1,11.5151324 1.13559454,10.5619345 1.38913364,9.65805651 L3.31481075,10.1982117 C3.10672013,10.940064 3,11.7119264 3,12.5 C3,17.1944204 6.80557963,21 11.5,21 C16.1944204,21 20,17.1944204 20,12.5 C20,7.80557963 16.1944204,4 11.5,4 C10.54876,4 9.62236069,4.15592757 8.74872191,4.45446326 L9.93948308,5.87355717 C10.0088058,5.95617272 10.0495583,6.05898805 10.05566,6.16666224 C10.0712834,6.4423623 9.86044965,6.67852665 9.5847496,6.69415008 L4.71777931,6.96995273 C4.66931162,6.97269931 4.62070229,6.96837279 4.57348157,6.95710938 C4.30487471,6.89303938 4.13906482,6.62335149 4.20313482,6.35474463 L5.33163823,1.62361064 C5.35654118,1.51920756 5.41437908,1.4255891 5.49660017,1.35659741 C5.7081375,1.17909652 6.0235153,1.2066885 6.2010162,1.41822583 L7.38979581,2.8349582 Z" fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        @if($order->post)
                                        <span>{{ date('Y-m-d',strtotime($order->post->post_date)) }}</span>
                                        @endif
                                    </a>

                                        <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-11-19-154210/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Dollar.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1"/>
                                                    <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1"/>
                                                    <path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        @if($order->order_meta)
                                        <span>{{ $order->order_meta()->pluck('meta_value','meta_key')->toArray()['_line_total']}}</span>
                                        <span>¥</span>
                                    @endif
                                    </a>

                                    </div>
                                    <!--end::Contacts-->
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20"  style="direction: rtl;text-align:right">
                            <div class="col-12">
                                <h3>المنتجات</h3>
                            </div>
                        </div>
                        <div class="row mt-10"  style="direction: rtl;text-align:right">
                            @foreach($order->order_details as $detail)
                            @php
                                $product = $detail->post;
                                $meta = $product->meta
                            @endphp
                            <div class="col-12">
                                <div class="d-flex mb-8">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-120 flex-shrink-0 mr-4">
                                        <div class="d-flex flex-column">
                                            <div class="symbol-label mb-3" style="">
                                                    <img id="AsidePhoto" class="kt-widget__img " src="{{$product->product_image ??  asset('/images/product.png')}}" style="object-fit: cover;width:100%;hegiht:100%" alt="image">
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-2">{{ $product->post_content }}</a>
                                        <span class="text-muted font-weight-bold font-size-sm mb-3">{{ $product->post_title }}</span>
                                        <span class="text-muted font-weight-bold font-size-lg">الكمية:
                                        <span class="text-dark-75 font-weight-bolder">{{$detail->product_qty }}</span></span>
                                        <span class="text-muted font-weight-bold font-size-lg">بتاريخ:
                                            <span class="text-dark-75 font-weight-bolder">{{date('Y-m-d',strtotime($detail->date_created)) }}</span></span>
                                            <span class="text-muted font-weight-bold font-size-lg">صافي إيرادات المنتج:
                                                <span class="text-dark-75 font-weight-bolder">{{$detail->product_net_revenue}}</span></span>
                                                <span class="text-muted font-weight-bold font-size-lg">إجمالي عائدات المنتج:
                                                    <span class="text-dark-75 font-weight-bolder">{{$detail->product_gross_revenue}}</span></span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
            <!--end::Body-->
        </div>
    </div>
</div>

@endsection


@push('scripts')

@endpush
