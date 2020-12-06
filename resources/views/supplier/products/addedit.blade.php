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
                                <img id="AsidePhoto" class="kt-widget__img " src="{{$product->product_image ??  asset('/images/product.png')}}" style="object-fit: cover" alt="image">
                            </div>
                            <div class="kt-widget__content">
                                <div class="kt-widget__section">
                                    <a href="#" class="kt-widget__username" id="product_name">
                                   {{$product->post_title ?? 'Product Name '}}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="kt-widget__body">
                            <a id="cmdProductType" data-target="Productype" class="cmdPage kt-widget__item kt-widget__item--active">نوع المنتج</a>
                            <a id="cmdGeneralInfo" data-target="GeneralInfo" class="cmdPage kt-widget__item " @if($product==null || ($product && $product->product_type && $product->product_type->term &&  $product->product_type->term->name!=\ProductTypes::SIMPLE)) style="display:none" @endif>معلومات المنتج العامة</a>
                            <a id="cmdInventoryInfo" data-target="InventoryInfo" class="cmdPage kt-widget__item" @if($product==null || ($product && $product->product_type && $product->product_type->term &&  $product->product_type->term->name!=\ProductTypes::SIMPLE)) style="display:none" @endif>معلومات المخزن</a>
                            <a id="cmdShippingInfo" data-target="ShippingInfo" class="cmdPage kt-widget__item" @if($product==null || ($product && $product->product_type && $product->product_type->term &&  $product->product_type->term->name!=\ProductTypes::SIMPLE)) style="display:none" @endif>معلومات الشحن</a>
                            <a id="cmdAttributesInfo" data-target="AttributesInfo" class="cmdPage kt-widget__item">سمات المنتج</a>
                            <a id="cmdProductVariations" data-target="ProductVariations" class="cmdPage kt-widget__item"  @if($product==null || ($product && $product->product_type && $product->product_type->term &&  $product->product_type->term->name!=\ProductTypes::VARIABLE)) style="display:none" @endif>Product Variations</a>
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
        </div>

        <!--Begin:: App Content-->
        <div class="kt-grid__item kt-grid__item--fluid kt-app__content mr-10">
            <div class="row">
                <div class="col-xl-12">
                   @include('supplier.products.components.product_form.product_main')
                   @include('supplier.products.components.product_form.general_info')
                   @include('supplier.products.components.product_form.inventory_info')
                   @include('supplier.products.components.product_form.shipping_info')
                   @include('supplier.products.components.product_form.attributes_info')
                   @include('supplier.products.components.product_form.product_variations')
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
        let cmdProductType = $("#cmdProductType");
        let cmdGeneralInfo = $("#cmdGeneralInfo");
        let cmdInventoryInfo = $("#cmdInventoryInfo");
        let cmdShippingInfo = $("#cmdShippingInfo");
        let cmdAttributesInfo = $("#cmdAttributesInfo");
        let cmdProductVariations = $("#cmdProductVariations");
        // sections
        let Productype = $("#Productype");
        let GeneralInfo = $("#GeneralInfo");
        let InventoryInfo = $("#InventoryInfo");
        let ShippingInfo = $("#ShippingInfo");
        let AttributesInfo = $("#AttributesInfo");
        let ProductVariations = $("#ProductVariations");
        // forms
        let FormProductype = Productype.find('form');
        let FormGeneralInfo = GeneralInfo.find('form');
        let FormInventoryInfo = InventoryInfo.find('form');
        let FromShippingInfo = ShippingInfo.find('form');
        let FromAttributesInfo= AttributesInfo.find('form');
        let FromProductVariations= ProductVariations.find('form');
        //hide sections
        GeneralInfo.hide();
        InventoryInfo.hide();
        ShippingInfo.hide();
        AttributesInfo.hide();
        ProductVariations.hide();
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
        function hideSimpleFormOptions(){
            //product general info
            cmdGeneralInfo.slideUp(1000);
            //product inventory info
            cmdInventoryInfo.slideUp(1000)
            //product shipping info
            cmdShippingInfo.slideUp(1000);
        }
        function displaySimpleFormOptions(){
            //product general info
            cmdGeneralInfo.slideDown(1000);
            //product inventory info
            cmdInventoryInfo.slideDown(1000)
            //product shipping info
            cmdShippingInfo.slideDown(1000);
        }
        function productTypeChanged(value){
            if (value == 'variable') {
                hideSimpleFormOptions();
                cmdProductVariations.slideDown(1000);
            }
            else if (value == 'simple') {
                displaySimpleFormOptions();
                $("#ProductVariations").slideUp(1000);
                cmdProductVariations.slideUp(1000);
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
