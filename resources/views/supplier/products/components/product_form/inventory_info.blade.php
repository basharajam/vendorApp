@php
$meta = [];
if($product){
    $meta = $product->meta;
}
@endphp
<div class="kt-portlet" id="InventoryInfo" style="diaplay:none" >
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">{{__("معلومات المخزن")}}</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        @include('supplier.products.components.product_form.inventory_form',['product'=>$product])
    </div>
</div>
