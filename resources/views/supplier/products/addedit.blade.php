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
            @if($product && $product->product_image)

               <!--Begin:: App Aside-->
        <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">
            <div class="kt-portlet kt-portlet--height-fluid-">
                <div class="kt-portlet__body">
                    <div class="kt-widget kt-widget--user-profile-4">
                        <div class="kt-widget__head">
                            <div class="kt-widget__content">
                                <div class="kt-widget__section">
                                    <a href="#" class="kt-widget__username" id="">
                                        {{__("صورة المنتج")}}
                                    </a>
                                </div>
                            </div>
                            <div class="kt-widget__media">
                                <!--Product Image-->
                                <img id="AsidePhoto" class="kt-widget__img zoom" src="{{\General::IMAGE_URL_UPLOADS.$product->product_image->post_name ??  asset('/images/product.png')}}" style="object-fit: cover" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End:: App Aside-->
        @endif

        @if($product)
        <!--Begin:: App Aside-->
        <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user2_profile_aside">
            <div class="kt-portlet kt-portlet--height-fluid-">

                <div class="kt-portlet__body">
                    <div class="kt-widget kt-widget--user-profile-4" >
                        <div class="kt-widget__head">
                            <div class="kt-widget__content">
                                <div class="kt-widget__section">
                                    <a href="#" class="kt-widget__username" id="">
                                        {{__("معرض الصور")}}
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
        @endif



        </div>

        <!--Begin:: App Content-->
        <div class="kt-grid__item kt-grid__item--fluid kt-app__content mr-10">
            <div class="row">
                <div class="col-xl-12">
                    <div class="kt-portlet" id="Productype" style="" >
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">{{__("نوع المنتج")}}</h3>
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
                                <input type="hidden" name="al_supplier_name" value="{{ \Auth::user()->name }}">
                                <input type="hidden" name="post_author"  value="{{ \Auth::user()->wordpress_user->ID ?? 0 }}">
                                @include('supplier.products.components.product_form.product_main')
                                @include('supplier.products.components.product_form.general_info')
                                @include('supplier.products.components.product_form.categories_selector')
                                @include('supplier.products.components.product_form.inventory_info')
                                @include('supplier.products.components.product_form.shipping_info')
                                 @php $where='simple' @endphp
                                @include('supplier.products.components.product_form.props_main')
                               
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group  mt-10 mb-0 p-10">
                                            <button type="submit" class="btn btn-primary ">
                                                {{__('حفظ')}}
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
                                <input type="hidden" name="supplierU" value="{{ \Auth::user()->username }}" >
                                @include('supplier.products.components.product_form.product_main')
                                @if($product)
                                    @include('supplier.products.components.product_form.categories_selector')
                                     @php $where='variable' @endphp
                                     @include('supplier.products.components.product_form.props_main')
                                  
                                    @include('supplier.products.components.product_form.attributes_info')
                                    {{-- @include('supplier.products.components.product_form.product_variations') --}}
                                @endif
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group  mt-10 mb-0">
                                            <button type="submit" class="btn btn-dark ">
                                                {{__("حفظ")}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="w-100">
                                @include('supplier.products.components.product_form.variations_card_container')
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
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>

<!-- By Blaxk  -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
    $(function(){
         //$('#attributesSelectorInput').select2();
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


        //Inputmask().mask(document.querySelectorAll("input"));
        function checkSalePrice(){
            let sale = $("#_sale_price").val();
            let price = $("#_regular_price").val();
            if(parseFloat(sale) >= parseFloat(price))
            {
                toastr.error('{{__("الرجاء ادخال قيمة اصغر من السعر")}}');
                $([document.documentElement, document.body]).animate({
                    scrollTop: $("#GeneralInfo").offset().top
                }, 2000);
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
                toastr.error('{{__("الرجاء ادخال قيمة اكبر من الحد الادنى للكمية")}}');
                $([document.documentElement, document.body]).animate({
                    scrollTop: $("#InventoryInfo").offset().top
                }, 500  );
                return false;
            }
            else{
              return true;
            }
        }

        $(document).on('change',"._sale_price",function(){
            let value = $(this).val();
            let regural_price_value =$("#_regular_price").val();
            if(parseFloat(value) >= parseFloat(regural_price_value))
            {
                $("#_sale_price_help").text('{{__("الرجاء ادخال قيمة اصغر من السعر")}}')
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
                $("#_wc_max_qty_product_help").text('{{__("الرجاء ادخال قيمة اكبر من الحد الادنى للكمية")}} ')
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
<script>
    $(function(){
        $("#galleryForm").submit(function(){
            var $fileUpload = $("#galleryForm input[type='file']");
            if (parseInt($fileUpload.get(0).files.length)>15){
                toastr.error('اقصى عدد للصور هو  15 صورة ')
                return false;
            }
        });
    })
</script>


<!-- By Blaxk  -->
<script>

    //Product Validation Start
    $(document).ready(function(){

        var lengthVal = 6;
        var maxLengthVal = 128 ;


        //Validate Simple Product 
        $( "#ProductForm" ).validate({
        rules: {

            "post_title": {
                required:true,
                minlength:lengthVal,
                maxlength:maxLengthVal
               
            },
            "post_content":{
                required:true,
                minlength:lengthVal
            },
            "_regular_price":{
                required:true,
                digits :true,
            },
            "_sale_price":{
                digits :true
            },
            "al_thickness":{
                maxlength :maxLengthVal
            },
            "al_carton_qty":{
                digits :true
            },
            "al_price_for_desc":{
                digits:true
            },
            "al_mix_of_package":{
                digits:true
            },
            "_weight":{
                digits:true
            },
            "al_cbm":{
                digits:true
            },
            "al_days_to_delivery":{
                digits:true
            },
            "_wc_min_qty_product":{
                digits:true
            },
            "_wc_max_qty_product":{
                digits:true
            },
            "al_material":{
                maxlength:maxLengthVal
            },
            "al_printing":{
                maxlength:maxLengthVal
            },
            "al_size":{
                maxlength:maxLengthVal
            },
            "al_added":{
                maxlength:maxLengthVal
            },
            "al_more_info":{
                maxlength:maxLengthVal
            },
            "al_color":{
                maxlength:maxLengthVal
            },
            "_sku":{
                maxlength:maxLengthVal
            },
        },
        messages: {
            "post_title": {
                required:function(){
                    toastr.error('{{ __("هذا الحقل مطلوب") }}')

                },
                minlength:function(){
            
                    toastr.error('{{ __("يجب أن تتكون البيانات المدخلة من 6 محارف على الأقل") }}')
                },
                maxlength:function(){
                 
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },
            "post_content": {
                required:function(){
                    toastr.error('{{ __("هذا الحقل مطلوب") }}')  
                },
                minlength:function(){
               
                    toastr.error('{{ __("يجب أن تتكون البيانات المدخلة من 6 محارف على الأقل") }}')
                },
            },
            "_regular_price": {
                   digits: function() {
                      
                     toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                } 
            },               
            "_sale_price": {
                   digits: function() {
                    
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                   },                
            },
            "al_thickness": {
                maxlength:function () {
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },
            "al_carton_qty":{
                digits: function() {
                
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                },
            },
            "al_price_for_desc":{
               digits: function() {
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                },
            },
            "al_mix_of_package":{
                digits: function() {
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                },
            },
            "_weight":{
                digits: function() {
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                },
            },
            "al_cbm":{
                digits: function() {
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                },
            },
            "al_days_to_delivery":{
                digits: function() {
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                },
            },
            "_wc_min_qty_product":{
                digits:function(){
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                }
            },
            "_wc_max_qty_product":{
                digits:function(){
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                }
            },
            "al_material":{
                maxlength:function(){
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },
            "al_printing":{
                maxlength:function(){
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },
            "al_size":{
                maxlength:function(){
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },
            "al_added":{
                maxlength:function(){
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },
            "al_more_info":{
                maxlength:function(){
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },
            "al_color":{
                maxlength:function(){
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },
            "_sku":{
                maxlength:function(){
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },

            
            
            }

        })

        //end product simple validation 


        //validate product variable form
        $( "#ProductFormVariation" ).validate({
            rules: {

                "post_title": {
                    required:true,
                    minlength:lengthVal,
                    maxlength:maxLengthVal
                
                },
                "post_content":{
                    required:true,
                    minlength:lengthVal
                },
            },
            messages:{
                "post_title":{
                    minlength:function(){
             
                    toastr.error('{{ __("يجب أن تتكون البيانات المدخلة من 6 محارف على الأقل") }}')
                 }
                },
                "post_content":{
                    minlength:function(){
                        toastr.error('{{ __("يجب أن تتكون البيانات المدخلة من 6 محارف على الأقل") }}')
                    }
                },
              }
            })


        //ProductFormVariation
            //Product form Variation Attr
     $("#ProductFormVarAttr").validate({
        rules: {

            "post_title": {
                required:true,
                minlength:lengthVal,
                maxlength:maxLengthVal
               
            },
            "post_content":{
                required:true,
                minlength:lengthVal
            },
            "_regular_price":{
                required:true,
                digits :true,
            },
            "_sale_price":{
                digits :true
            },
            "al_thickness":{
                maxlength :maxLengthVal
            },
            "al_carton_qty":{
                digits :true
            },
            "al_price_for_desc":{
                digits:true
            },
            "al_mix_of_package":{
                digits:true
            },
            "_weight":{
                digits:true
            },
            "al_cbm":{
                digits:true
            },
            "al_days_to_delivery":{
                digits:true
            },
            "_wc_min_qty_product":{
                digits:true
            },
            "_wc_max_qty_product":{
                digits:true
            },
            "al_material":{
                maxlength:maxLengthVal
            },
            "al_printing":{
                maxlength:maxLengthVal
            },
            "al_size":{
                maxlength:maxLengthVal
            },
            "al_added":{
                maxlength:maxLengthVal
            },
            "al_more_info":{
                maxlength:maxLengthVal
            },
            "al_color":{
                maxlength:maxLengthVal
            },
            "_sku":{
                maxlength:maxLengthVal
            },
        },
        messages: {

            "_regular_price": {
                   digits: function() {
                      
                     toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                } 
            },               
            "_sale_price": {
                   digits: function() {
                    
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                   },                
            },
            "al_thickness": {
                maxlength:function () {
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },
            "al_carton_qty":{
                digits: function() {
                
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                },
            },
            "al_price_for_desc":{
               digits: function() {
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                },
            },
            "al_mix_of_package":{
                digits: function() {
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                },
            },
            "_weight":{
                digits: function() {
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                },
            },
            "al_cbm":{
                digits: function() {
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                },
            },
            "al_days_to_delivery":{
                digits: function() {
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                },
            },
            "_wc_min_qty_product":{
                digits:function(){
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                }
            },
            "_wc_max_qty_product":{
                digits:function(){
                    toastr.error('{{ __("المدخل يجب ان يكون رقم") }}')
                }
            },
            "al_material":{
                maxlength:function(){
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },
            "al_printing":{
                maxlength:function(){
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },
            "al_size":{
                maxlength:function(){
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },
            "al_added":{
                maxlength:function(){
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },
            "al_more_info":{
                maxlength:function(){
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },
            "al_color":{
                maxlength:function(){
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },
            "_sku":{
                maxlength:function(){
                    toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            },

            
            
            }

        })

        //End validate Form variation attr


    })

    //End Product Validation 



    

</script>

<script>


        //Update Property Status Function
        function UpdateStatus(PropId,form,PropStatus){

            $.ajax({
            url:"{{ route('StatusProp') }}",
            method:"post",
            data:form,
            success:function(resp){

                console.log(PropStatus)
                //Set Styling Classess

                switch(PropStatus) {
                case 0:
                    // code block
           
                    $('.statusBtn'+PropId).addClass('btnCheckd')
                    $('.statusBtn'+PropId).empty()
                    $('.statusBtn'+PropId).append('<i style="color:green" class="fa fa-check" aria-hidden="true"></i>')
                    $('.statusBtn'+PropId).data('status',1)
                    $('.statusBtn'+PropId).attr('data-status',1)
                    
                    
                    break;
                case 1:
                    console.log('prop status  shold be 1',PropStatus)
                    $('.statusBtn'+PropId).removeClass('btnCheckd')
                    $('.statusBtn'+PropId).empty()
                    $('.statusBtn'+PropId).data('status',0)
                    $('.statusBtn'+PropId).attr('data-status',0)
                    // code block
                    //Change Data value 
                    break;
                }



                if(resp.success){

                    //fetch Success Error
                    toastr.success('{{__("تمت العملية بنجاح")}}');

                }

            },
            error:function(xhr){
            
                //Fetch Wrong Error
                toastr.error('{{__("لقد حدث خطأ ما , الرجاء المحاولة لاحقاً")}}');
            }
            })
        }

    $(document).on('click','.StatusPropBtn',function(e){

        e.preventDefault();

        //Get Values
        var PropId = $(this).data('prop');
        var PropStatus = $(this).data('status')
        var form ={
            PropIdI:PropId,
            _token:"{{ csrf_token() }}"
        }
        
        //Set Request Function
      

        //Update Property Status
        UpdateStatus(PropId,form,PropStatus)


    })










    $(document).on('click','.DelMetaBtn',function(e){

        e.preventDefault();

        //Get Values 
        var $this=$(this);
        var MetaId= $this.data('meta');
        var where = $this.data('where');
        var form = {
            MetaIdI:MetaId,
            WhereI:where,
            _token:"{{ csrf_token() }}"
        }
        //Do Request 
        $.ajax({
            url:"{{ route('DelPostMeta') }}",
            method:"post",
            data:form,
            success:function(resp){

        

               //Empty Old Container 
               $('.PropsContainer').empty();
                console.log('Prop Table Empty now')
               //Set New Values
             

               $(".PropsContainer"+where).load("{{ route('PropsTable') }}",{'props':resp.props,'productID':"@if(!empty($product)){{$product->ID}} @endif ",'where':where,'_token':"{{csrf_token()}}"}); 

                console.log('Props Load')

               //Fetch Success Error
               if(resp.success){
                  toastr.success('{{__("تمت العملية بنجاح")}}');
               }

                
            },
            error:function(xhr){

            //Fetch Wrong Error
            toastr.error('{{__("لقد حدث خطأ ما , الرجاء المحاولة لاحقاً")}}');

            }
        })

    })




    var CatArr = [];
    //get Related Properties When Select Category
    $(document).on('change','.categorySel',function(){

        var Category = $(this).val();
        CatArr.push(Category)
        
        var form = {
            CatArrI:CatArr,
            _token:"{{ csrf_token() }}"
        }

        let where = $('input[name="product_type"]:checked').val();

        if(where === undefined){
             where = 'simple';
        }
        
        //get Properties 
        $.ajax({
            url:"{{ route('getProps') }}",
            method:'post',
            data:form,
            success:function(resp){


                //Fetch Properties
                //Empty Old Container 
               $('.PropsContainer').empty();

                //Set New Values


                $(".PropsContainer"+where).load("{{ route('PropsTableForm') }}",{'props':resp.props,'productID':"@if(!empty($product)){{$product->ID}} @endif ",'where':where,'_token':"{{csrf_token()}}"}); 


            }
        })
        

        })


        

        $(document).on('focusout','.UpdValI',function(){


            //get input name 

         
            //Update Property Value 

                //get Values
                var PropId=$(this).data('prop');
                var CategoryId=$(this).data('cat');
                var Input = $(this).attr('name');
                var where = $(this).data('where');
                var PropVal = $(this).val();

                var form = {
                    PropIdI:PropId,
                    PropValueI:PropVal,
                    PropCategoryIdI:CategoryId,
                    CatArrI:CatArr,
                    _token:"{{ csrf_token() }}"
                }


                // Check Values 
                if(PropVal !== undefined && PropId !== null){

                    //Do Request 
                    $.ajax({
                        url:"{{ route('UpdPropAj') }}",
                        method:"post",
                        where:where,
                        data:form,
                        success:function(resp){
                            //Empty Old Container 


                            //Fetch Success Error
                            if(resp.success){
                                toastr.success('{{__("تمت العملية بنجاح")}}');
                            }
                        },
                        error:function(xhr){
                            //Fetch Wrong Error
                            toastr.error('{{__("لقد حدث خطأ ما , الرجاء المحاولة لاحقاً")}}');
                        }
                    });
                }
                else{
                    //Fetch Wrong Error
                    toastr.error('{{__("لقد حدث خطأ ما , الرجاء المحاولة لاحقاً")}}');
                }

            //Update property Status 
                //get Values 
                var PropStatus = $(this).data('status');
                var form2 = {
                    PropIdI:PropId,
                     _token:"{{ csrf_token() }}"
                }

                if(PropStatus == 0){

                    UpdateStatus(PropId,form2,PropStatus)
                
                }

        })





        
        $(document).on('click','.UpdatePropBtn',function(e){

            e.preventDefault();

            var where = $(this).data('where');

            //get Values
            var PropId=$(this).data('prop');
            var inputName='input[name=:name]';
            var PropName0 =inputName.replace(':name','_propName'+PropId+where);
            var PropName=$(PropName0).val();
            var PropVal0 = inputName.replace(':name','_propVal'+PropId+where);
            var PropVal=$(PropVal0).val();
            var CategoryId=$(this).data('cat');
            
            var form = {
                PropIdI:PropId,
                PropNameI:PropName,
                PropValueI:PropVal,
                PropCategoryIdI:CategoryId,
                CatArrI:CatArr,
                _token:"{{ csrf_token() }}"
            }

            
            // Check Values 
            if(PropName !== undefined && PropVal !== undefined && PropId !== null){

                //Do Request 
                $.ajax({
                    url:"{{ route('UpdPropAj') }}",
                    method:"post",
                    where:where,
                    data:form,
                    success:function(resp){
                        //Empty Old Container 
                        $('.PropsContainer').empty();

                        //Set New Values
                        $(".PropsContainer"+where).load("{{ route('PropsTableForm') }}",{'props':resp.props,'productID':"@if(!empty($product)){{$product->ID}} @endif ",'where':this.where,'_token':"{{csrf_token()}}"}); 

            

                        //Fetch Success Error
                        if(resp.success){
                            toastr.success('{{__("تمت العملية بنجاح")}}');
                        }
                    },
                    error:function(xhr){
                        //Fetch Wrong Error
                        toastr.error('{{__("لقد حدث خطأ ما , الرجاء المحاولة لاحقاً")}}');
                    }
                });
            }
            else{
                //Fetch Wrong Error
                toastr.error('{{__("لقد حدث خطأ ما , الرجاء المحاولة لاحقاً")}}');
            }

            
        })








</script>


@endpush
