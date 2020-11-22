<div class="kt-portlet" id="ShippingInfo" style="" >
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">معلومات الشحن</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <form action="{{ route('supplier.products.store') }}" method="post">
            @csrf
            <input type="hidden" name="supplier_name" value="{{ \Auth::user()->name }}">
            <input type="hidden" name="post_id"  value="{{ $product->ID ?? 0 }}">
            <input type="hidden" name="post_author"  value="{{ \Auth::user()->wordpress_user->ID ?? 0 }}">
            <input type="hidden" name="request_type" value="shipping">
            @include('supplier.products.components.product_form.shipping_form',['product'=>$product])

            <div class="form-group row mt-10 mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary ">
                        حفظ
                        <span class="spinner spinner-white spinner-md mr-10 saving" style="display:none"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
