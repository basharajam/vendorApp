@php
$product_categories = [];
if($product){
    $product_categories = $product->categories->pluck('term_taxonomy_id')->toArray();
}
@endphp
<div class="kt-portlet" id="categoriesSelector">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">الاصناف و التاغات</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="row">
            <div class="col-6">
                <h3 class="kt-portlet__head-title text-center mb-4">الاصناف</h3>
                <div class="w-100" style="max-height: 400px; overflow-y:scroll;border:1px solid #aaa">
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
            </div>
            <div class="col-6">
                <h3 class="kt-portlet__head-title text-center mb-4">التاغات</h3>
                @include('supplier.products.components.product_form.tags_selector')
            </div>
        </div>
    </div>
</div>
