
<div class="kt-portlet" id="GeneralInfo" >
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">{{__('معلومات المنتج العامة')}}</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
           @include('supplier.products.components.product_form.general_info_form',['product'=>$product])
    </div>
</div>
