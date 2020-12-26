@php
$product_categories = [];
if($product){
    $product_categories = $product->categories->pluck('term_taxonomy_id')->toArray();
}
@endphp
<form action="{{ route('supplier.products.store') }}" method="post">
    <div class="w-100" style="max-height: 400px; overflow-y:scroll">
        @csrf
        <input type="hidden" name="post_id"  value="{{ $product->ID ?? 0 }}">
        <input type="hidden" name="post_author"  value="{{ \Auth::user()->wordpress_user->ID ?? 0 }}">
        <input type="hidden" name="request_type" value="categories">
        @foreach($main_categories as $main_category)
        <!--begin::Item-->
        <div class="d-flex align-items-center mb-6">
            <!--begin::Checkbox-->
            <label class="checkbox checkbox-lg checkbox-primary flex-shrink-0 m-0 mr-4">
                <input type="checkbox" name="product_categories[]" value="{{ $main_category->term_taxonomy_id}}" @if(in_array($main_category->term_taxonomy_id,$product_categories)) checked @endif title="الرجاء تعبئة هذا الحقل">
                <span></span>
            </label>
            <!--end::Checkbox-->
            <!--begin::Text-->
            <div class="d-flex flex-column flex-grow-1 py-2" style="text-align: right" >
                <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1 mr-10">
                    {{ $main_category->term->name }}
                </a>
            </div>
            <!--end::Text-->
        </div>
        <!--end::Item-->
        @foreach($categories as $sub_cateogry)
            @if($sub_cateogry->parent == $main_category->term_taxonomy_id)
                 <!--begin::Sub Item-->
                <div class="d-flex align-items-center mb-6 pr-10">
                    <!--begin::Checkbox-->
                    <label class="checkbox checkbox-lg checkbox-primary flex-shrink-0 m-0 mr-4">
                        <input type="checkbox" name="product_categories[]" value="{{ $sub_cateogry->term_taxonomy_id}}" @if(in_array($sub_cateogry->term_taxonomy_id,$product_categories)) checked @endif title="الرجاء تعبئة هذا الحقل">
                        <span></span>
                    </label>
                    <!--end::Checkbox-->
                    <!--begin::Text-->
                    <div class="d-flex flex-column flex-grow-1 py-2" style="text-align: right" >
                        <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1 mr-10">
                            {{ $sub_cateogry->term->name }}
                        </a>
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Sub Item-->
            @endif
        @endforeach
        @endforeach

    </div>

    <div class="form-group row mt-10 mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary ">
                حفظ
                <span class="spinner spinner-white spinner-md mr-10 saving" style="display:none"></span>
            </button>
        </div>
    </div>
</form>
