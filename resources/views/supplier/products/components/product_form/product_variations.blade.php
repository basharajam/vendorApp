@php
$product_attributes = [];
if($product){
    $product_attributes = $product->product_attributes;
}
@endphp

<div class="kt-portlet" id="ProductVariations" style="display:none" >
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
            </form>
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
        </div>
        <form action="{{ route('supplier.products.store') }}" method="post" enctype="multipart/form-data">

        </form>
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
