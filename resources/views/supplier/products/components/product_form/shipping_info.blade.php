<div class="kt-portlet" id="ShippingInfo" style="" >
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">{{__("معلومات الشحن")}}</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
            @include('supplier.products.components.product_form.shipping_form',['product'=>$product])
    </div>
</div>
