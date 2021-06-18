<form method="POST" action="{{ route("supplier.products.variation.storeMeta") }}"  id='ProductFormVarAttr' class="general_row">
    @csrf
    <input type="hidden" name="post_id" value="{{ $variation->ID }}">
    <input type="hidden" name="post_parent" value="{{ $product->ID }}">
    <input type="hidden" name="post_author" value="{{ $variation->post_author }}">
    @include('supplier.products.components.product_form.general_info_form',['product'=>$variation])
    @include('supplier.products.components.product_form.inventory_form',['product'=>$variation])
    @include('supplier.products.components.product_form.shipping_form',['product'=>$variation])
    {{$where='variationAttr'}}
    @include('supplier.products.components.product_form.props_main')
    <div class="form-group row mt-10 mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary ">
                {{__('حفظ')}}
                <span class="spinner spinner-white spinner-md mr-10 saving" style="display:none"></span>
            </button>
           
            <a id="{{ $product->ID }}" data-type='variation' data-varid='{{ $variation->ID }}' data-remove="#row{{ $variation->ID }}" class="btn btn-danger  delete" data-action-name="{{ route('supplier.products.delete',$variation->ID) }}" href="javascript:;"  >Delete</a>
        </div>
    </div>
</form>

