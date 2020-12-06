@php
if($product)
{
    $product_type = $product->product_type;
}
@endphp
<div class="row">
    <div class="col-12 mb-10" style="text-align: right">
        <h3>اختر نوع المنتج</h3>
        <span class="required">*</span>
    </div>
    <div class="col-lg-6">
        <label class="option">
            <span class="option-control">
                <span class="radio">
                    <input type="radio" name="product_type" value="simple" @if($product && $product_type && $product_type->term &&  $product_type->term->name==\ProductTypes::SIMPLE) checked="checked" @elseif($product!=null && $product->product_type) disabled @endif required>
                    <span></span>
                </span>
            </span>
            <span class="option-label">
                <span class="option-head">
                    <span class="option-title">قياس واحد</span>
                    <span class="option-focus"></span>
                </span>
                {{-- <span class="option-body">some descriptoin about this type</span> --}}
            </span>
        </label>
    </div>
    <div class="col-lg-6">
        <label class="option">
            <span class="option-control">
                <span class="radio">
                    <input type="radio" name="product_type" value="variable" @if($product && $product_type && $product_type->term &&  $product_type->term->name==\ProductTypes::VARIABLE) checked="checked" @elseif($product!=null && $product->product_type) disabled @endif>
                    <span></span>
                </span>
            </span>
            <span class="option-label">
                <span class="option-head">
                    <span class="option-title">عدة قياسات</span>
                    <span class="option-focus"></span>
                </span>
                {{-- <span class="option-body">some descriptoin about this type</span> --}}
            </span>
        </label>
    </div>
</div>
