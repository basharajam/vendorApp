@php
$product_attributes = [];
if($product){
    $product_attributes = $product->product_attributes;
}
@endphp

<div class="w-100" id="ProductVariations" style="display:none" >
    <div class="kt-portlet">
        <div class="kt-portlet__head align-items-center d-flex justify-content-between" >
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">Product Variations</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="#" class="btn btn-warning font-weight-bolder" id="addVariationButton">
                <span class="svg-icon svg-icon-md">
                    Add Variation
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span></a>
                <!--end::Button-->
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="w-100" id="variationFormContainer" style="display: none">
                <form method="POST" action="{{ route('supplier.products.variation.store') }}">
                    @csrf
                    <input type="hidden" name="post_parent"  value="{{ $product->ID ?? 0 }}">
                    <input type="hidden" name="post_id"  value="0">
                    <input type="hidden" name="post_author"  value="{{ \Auth::user()->wordpress_user->ID ?? 0 }}">
                    <div class="row" style="align-items:center ">
                        @foreach($product_attributes as $key => $attribute)
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                                        <span>{{ str_replace('pa_','',$key) }}</span>
                                    </label>
                                    <div class="kt-input-icon d-flex justify-content-center" >
                                        <select  id="attributesSelectorInput"   name="attributes_values[]" class="form-control form-control-solid   font-size-h6 ">
                                            <option>Any</option>
                                            @foreach($attribute as $term)
                                            <option value="{{ $term->term_taxonomy_id }}" >{{ $term->term->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if($product_attributes)
                        <div class="col"  >
                            <button type="submit" class="btn btn-primary ">
                                حفظ
                                <span class="spinner spinner-white spinner-md mr-10 saving" style="display:none"></span>
                            </button>
                        </div>
                        @else
                        <div class="alert alert-custom alert-light-info fade show mb-5 w-100" role="alert">
                            <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                            </div>
                            <div class="alert-text mr-10" style="text-align: right">Please select product's attributes then add variations!</div>

                        </div>

                        @endif
                    </div>
                </form>

            </div>


        </div>
    </div>

    <div class="w-100" id="variationsContainer">
        <div class="accordion accordion-solid accordion-panel accordion-svg-toggle" id="accordionExample8">
            @if($product)
            @foreach($product->product_variations as $variation)
            <div class="card mb-10 mt-10">
                <div class="card-header" id="headingOne8" data-toggle="collapse" data-target="#collapseOne{{ $variation->ID }}" aria-expanded="false">
                    <div class="card-title" >
                        <div class="card-label">
                            <h3 class="font-weight-bolder font-size-h3">
                                @foreach($variation->product_attributes as $key=>$value)
                                <span>{{ $value[0]->term->name .' '}}</span>
                                @endforeach
                            </h3>
                        </div>
                        <span class="svg-icon">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Navigation/Angle-double-right.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                </div>
                <div id="collapseOne{{ $variation->ID }}" class="collapse w-100"  style="">
                    <div class="card-body w-100">
                        <div class="row">
                            <div class="col-12">
                                @include('supplier.products.components.product_form.variable_product_form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>


</div>
@push('scripts')
<script>
    $(function(){
        $("#addVariationButton").on('click',function(e){
            e.preventDefault();
            $("#variationFormContainer").slideDown();
        })
    });
</script>
@endpush
