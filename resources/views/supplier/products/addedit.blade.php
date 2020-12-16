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
                                @if($product && $product->product_image)
                                <img id="AsidePhoto" class="kt-widget__img zoom" src="{{\General::IMAGE_URL_UPLOADS.$product->product_image->post_name ??  asset('/images/product.png')}}" style="object-fit: cover" alt="image">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End:: App Aside-->
        <!--Begin:: App Aside-->
        <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user2_profile_aside">
            <div class="kt-portlet kt-portlet--height-fluid-">

                <div class="kt-portlet__body">
                    <div class="kt-widget kt-widget--user-profile-4" >
                        <div class="kt-widget__head">
                            <div class="kt-widget__content">
                                <div class="kt-widget__section">
                                    <a href="#" class="kt-widget__username" id="">
                                        معرض الصور
                                    </a>
                                </div>
                            </div>
                        </div>
                        @include('supplier.products.components.product_form.gallery_section')
                    </div>
                </div>
            </div>
        </div>
        <!--End:: App Aside-->
        <!--Begin:: App Aside-->
        <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user2_profile_aside">
            <div class="kt-portlet kt-portlet--height-fluid-">

                <div class="kt-portlet__body">
                    <div class="kt-widget kt-widget--user-profile-4" >
                        <div class="kt-widget__head">
                            <div class="kt-widget__content">
                                <div class="kt-widget__section">
                                    <a href="#" class="kt-widget__username" id="">
                                        الاصناف
                                    </a>
                                </div>
                            </div>
                        </div>
                        @include('supplier.products.components.product_form.categories_selector')
                    </div>
                </div>
            </div>
        </div>
        <!--End:: App Aside-->

         <!--Begin:: App Aside-->
         <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user2_profile_aside">
            <div class="kt-portlet kt-portlet--height-fluid-">

                <div class="kt-portlet__body">
                    <div class="kt-widget kt-widget--user-profile-4" >
                        <div class="kt-widget__head">
                            <div class="kt-widget__content">
                                <div class="kt-widget__section">
                                    <a href="#" class="kt-widget__username" id="">
                                        التاغات
                                    </a>
                                </div>
                            </div>
                        </div>
                        @include('supplier.products.components.product_form.tags_selector')
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
                    <div class="kt-portlet" id="Productype" style="" >
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">نوع المنتج</h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            @include('supplier.products.components.product_type_card',['product'=>$product])
                        </div>
                    </div>
                        <div class="w-100" id="ProductSimple" @if($product==null || ($product && $product->product_type && $product->product_type->term &&  $product->product_type->term->name==\ProductTypes::VARIABLE)) style=" display:none" @endif >
                            <form id="ProductForm" action="{{ route('supplier.products.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_type" value="simple">
                                <input type="hidden" name="post_id"  value="{{ $product->ID ?? 0 }}">
                                <input type="hidden" name="post_id"  value="{{ $product->ID ?? 0 }}">
                                <input type="hidden" name="supplier_name_simple" value="{{ \Auth::user()->name }}">
                                <input type="hidden" name="post_author"  value="{{ \Auth::user()->wordpress_user->ID ?? 0 }}">
                                @include('supplier.products.components.product_form.product_main')
                                @include('supplier.products.components.product_form.general_info')
                                @include('supplier.products.components.product_form.inventory_info')
                                @include('supplier.products.components.product_form.shipping_info')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group  mt-10 mb-0 p-10">
                                            <button type="submit" class="btn btn-primary ">
                                                حفظ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="ProductVariations"@if($product==null || ($product && $product->product_type && $product->product_type->term &&  $product->product_type->term->name==\ProductTypes::SIMPLE)) style=" display:none" @endif  >
                            <form id="ProductFormVariation" action="{{ route('supplier.products.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_type" value="variable">
                                <input type="hidden" name="post_id"  value="{{ $product->ID ?? 0 }}">
                                <input type="hidden" name="supplier_name" value="{{ \Auth::user()->name }}">
                                <input type="hidden" name="post_author"  value="{{ \Auth::user()->wordpress_user->ID ?? 0 }}">
                                @include('supplier.products.components.product_form.product_main')
                                @include('supplier.products.components.product_form.attributes_info')
                                @include('supplier.products.components.product_form.product_variations')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group  mt-10 mb-0">
                                            <button type="submit" class="btn btn-danger ">
                                                حفظ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="w-100">
                            @include('supplier.products.components.product_form.variations_card_container')
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
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>
<script>
    $(function(){
        // $('#attributesSelectorInput').select2();
        $('.tagsinput-field').select2();
    // let collection = document.getElementsByClassName("tagsinput-field");
    // for (let i = 0; i < collection.length; i++) {
    //         console.log(collection[i]);
    //         $(collection[i]).select2();
    //     }


    });
</script>
<script>
    $(function(){
        let _regular_price = document.getElementById('_regular_price');
        let _sale_price = document.getElementById('_sale_price');
        let _wc_min_qty_product = document.getElementById('_wc_min_qty_product');
        let _wc_max_qty_product = document.getElementById('_wc_max_qty_product');


        Inputmask().mask(document.querySelectorAll("input"));
        function checkSalePrice(){
            let sale = $("#_sale_price").val();
            let price = $("#_regular_price").val();
            if(parseFloat(sale) >= parseFloat(price))
            {
                return false;
            }
            else{
              return true;
            }
        }

        function checkMaxQuantity(){
            let max = $("#_wc_max_qty_product").val();
            let min = $("#_wc_min_qty_product").val();
            if(parseInt(max) < parseInt(min))
            {
                return false;
            }
            else{
              return true;
            }
        }

        $(document).on('change',"._sale_price",function(){
            let value = $(this).val();
            let regural_price_value =$("#_regular_price").val();
            if(parseInt(value) >= parseInt(regural_price_value))
            {
                $("#_sale_price_help").text('الرجاء ادخال قيمة اصغر من السعر')
            }
            else{
                $("#_sale_price_help").text('');
            }
        })
        $(document).on('change',"._wc_max_qty_product",function(){
            let value = $(this).val();
            let _wc_min_qty_product_value =$("#_wc_min_qty_product").val();
            if(parseInt(value) < parseInt(_wc_min_qty_product_value))
            {
                $("#_wc_max_qty_product_help").text('الرجاء ادخال قيمة اكبر من الحد الادنى للكمية ')
            }
            else{
                $("#_wc_max_qty_product_help").text('');
            }
        });

        $("#ProductForm").submit(function(){
           let max_validation =  checkMaxQuantity();
            let sale_validation = checkSalePrice();
            if(!max_validation || !sale_validation){
                return false;
            }
        })

    })
</script>
<script>
    $(function(){

        let Offcanvas = new KTOffcanvas('kt_user_profile_aside',{
                overlay:true,
                baseClass:'kt-app__aside',
                closeBy:'kt_user_profile_aside_close',
                toggleBy:'kt_subheader_mobile_toggle',
            });
        //commands
        // sections
        let ProductVariations = $("#ProductVariations");
        let ProductSimple = $("#ProductSimple");
        // forms
        //hide sections
        // cmdProductVariations.hide();
        //functions
        function hideAll(){
            //product type
            if(cmdProductType.hasClass("kt-widget__item--active")) {
                cmdProductType.removeClass("kt-widget__item--active");
                Productype.slideUp(1000);
            }
            //product general info
            if(cmdGeneralInfo.hasClass("kt-widget__item--active")) {
                cmdGeneralInfo.removeClass("kt-widget__item--active");
                GeneralInfo.slideUp(1000);
            }
            //product inventory info
            if(cmdInventoryInfo.hasClass("kt-widget__item--active")) {
                cmdInventoryInfo.removeClass("kt-widget__item--active");
                InventoryInfo.slideUp(1000);
            }
            //product shipping info
            if(cmdShippingInfo.hasClass("kt-widget__item--active")) {
                cmdShippingInfo.removeClass("kt-widget__item--active");
                ShippingInfo.slideUp(1000);
            }
            //product attributes
            if(cmdAttributesInfo.hasClass("kt-widget__item--active")) {
                cmdAttributesInfo.removeClass("kt-widget__item--active");
                AttributesInfo.slideUp(1000);
            }
            //product variations
            if(cmdProductVariations.hasClass("kt-widget__item--active")) {
                cmdProductVariations.removeClass("kt-widget__item--active");
                ProductVariations.slideUp(1000);
            }
        }

        function productTypeChanged(value){
            if (value == 'variable') {
                ProductSimple.slideUp(1000);
                ProductVariations.slideDown(1000);
                //remove required from simple


            }
            else if (value == 'simple') {
                ProductVariations.slideUp(1000);
                ProductSimple.slideDown(1000);

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
        $('input[type=radio][name=product_type]').change(function() {
            productTypeChanged(this.value);
        });

    });
</script>

@endpush
