<form method="POST" action="{{ route("supplier.products.variation.storeMeta") }}" class="general_row">
    @csrf
    <input type="hidden" name="post_id" value="{{ $variation->ID }}">
    <input type="hidden" name="post_parent" value="{{ $product->ID }}">
    <input type="hidden" name="post_author" value="{{ $variation->post_author }}">
    @include('supplier.products.components.product_form.general_info_form',['product'=>$variation])
    @include('supplier.products.components.product_form.inventory_form',['product'=>$variation])
    @include('supplier.products.components.product_form.shipping_form',['product'=>$variation])
    <div class="form-group row mt-10 mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary ">
                حفظ
                <span class="spinner spinner-white spinner-md mr-10 saving" style="display:none"></span>
            </button>
        </div>
    </div>
</form>

