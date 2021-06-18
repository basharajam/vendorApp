@php
$product_categories = [];
if($product){
    $product_categories = $product->categories->pluck('term_taxonomy_id')->toArray();
}
@endphp
<div class="kt-portlet" id="categoriesSelector">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">{{__("الاصناف و التاغات")}}</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="row">
            <div class="col-6">
                <h3 class="kt-portlet__head-title text-center mb-4">{{__("الاصناف")}}</h3>
                <div class="w-100" style="max-height: 400px; overflow-y:scroll;border:1px solid #aaa">
                    @foreach($main_categories as $main_category)
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-6">
                        <!--begin::Checkbox-->
                        <label class="checkbox checkbox-lg  flex-shrink-0 m-0 mr-4">
                            <input class="categorySel" type="checkbox" name="product_categories[]" value="{{ $main_category->term_taxonomy_id}}" @if(in_array($main_category->term_taxonomy_id,$product_categories)) checked @endif title="{{__('الرجاء تعبئة هذا الحقل')}}">
                            <span></span>
                           <div class="mr-4"> {{ $main_category->term->name }}</div>
                        </label>
                        <!--end::Checkbox-->
                    </div>
                    <!--end::Item-->
                    @foreach($categories as $sub_cateogry)
                        @if($sub_cateogry->parent == $main_category->term_taxonomy_id)
                             <!--begin::Sub Item-->
                            <div class="d-flex align-items-center mb-6 pr-10">
                                <!--begin::Checkbox-->
                                <label class="checkbox checkbox-lg  flex-shrink-0 m-0 mr-4">
                                    <input class="categorySel" type="checkbox" name="product_categories[]" value="{{ $sub_cateogry->term_taxonomy_id}}" @if(in_array($sub_cateogry->term_taxonomy_id,$product_categories)) checked @endif title="{{__('الرجاء تعبئة هذا الحقل')}}">
                                    <span ></span>

                                    <div class="mr-4"> {{ $sub_cateogry->term->name }}</div>
                                </label>
                                <!--end::Checkbox-->

                            </div>
                            <!--end::Sub Item-->
                        @endif
                    @endforeach
                    @endforeach

                </div>
            </div>
            <div class="col-6">
                <h3 class="kt-portlet__head-title text-center mb-4">{{__("التاغات")}}</h3>
                @include('supplier.products.components.product_form.tags_selector')
            </div>
        </div>
    </div>
</div>
