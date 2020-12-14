@php
$product_attributes = [];
if($product){
    $product_attributes = $product->product_attributes;
}
@endphp

<div class="w-100" id="">
    <div class="kt-portlet">
        <div class="kt-portlet__head align-items-center d-flex justify-content-between" >
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">انواع المنتج</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="#" class="btn btn-warning font-weight-bolder" id="addVariationButton">
                <span class="svg-icon svg-icon-md">
                   إضافة نوع
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
            <div id="loading-varaiations-form" class="mb-15 mt-15 text-center" style="display:none">
                <div class="spinner spinner-primary spinner-lg mr-15" style=""></div>
            </div>
            <div class="w-100" id="variationFormContainer" style="display: none">
                {{-- <form method="POST" action="{{ route('supplier.products.variation.store') }}">
                    @csrf
                    <input type="hidden" name="post_parent"  value="{{ $product->ID ?? 0 }}">
                    <input type="hidden" name="post_id"  value="0">
                    <input type="hidden" name="post_author"  value="{{ \Auth::user()->wordpress_user->ID ?? 0 }}"> --}}
                    <div class="row" style="align-items:center ">
                        @foreach($product_attributes as $key => $attribute)
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                                        <span>{{ str_replace('pa_','',$key) }}</span>
                                    </label>
                                    <div class="kt-input-icon d-flex justify-content-center" >
                                        <select  id="attributesSelectorInput"   name="attributes_values[]" class="form-control form-control-solid   font-size-h6 ">
                                            <option>اي قيمة</option>
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
                            <button
                                id="SubmitVariationButton"
                                type="submit"
                                class="btn btn-primary"
                                data-action="{{ route('supplier.products.variation.store') }}"
                                data-parent="{{ $product->ID ?? 0 }}"
                                data-id="0"
                                data-author="{{ \Auth::user()->wordpress_user->ID ?? 0 }}"
                                data-token="{{ csrf_token() }}"
                                >
                                حفظ
                                <span class="spinner spinner-white spinner-md mr-10 saving" style="display:none"></span>
                            </button>
                        </div>
                        @endif
                    </div>
                {{-- </form> --}}

            </div>


        </div>
    </div>




</div>
@push('scripts')
<script>
    $(function(){
        $("#addVariationButton").on('click',function(e){
            e.preventDefault();
            $("#variationFormContainer").slideDown();
            $(":input").inputmask();
        });
        $(document).on('click','#SubmitVariationButton',function(e){
            e.preventDefault();
            let action = $(this).attr('data-action');
            let post_author = $(this).attr('data-author');
            let post_parent = $(this).attr('data-parent');
            let post_id = $(this).attr('data-id');
            let _token= $(this).attr('data-token');
            let attributes_values = [];
            let attributes_selectors = document.getElementsByName("attributes_values[]");
            for(let i=0;i<attributes_selectors.length;i++){
                let value =$(attributes_selectors[i]).val();
                attributes_values.push(value);
            }
            let data = {
                "_token":_token,
                "post_id":post_id,
                "post_author":post_author,
                "post_parent":post_parent,
                "attributes_values":attributes_values
            }
            $("#loading-varaiations-form").show();
            $.ajax({
                url:action,
                type:"POST",
                data:data,
                success:function(respponse){
                   location.reload();
                },
                error:function(){
                    toastr.error('لقد حدث حطأ ما الرجاء المحاولة لاحقاً');
                },
                complete:function(){
                    $("#loading-varaiations-form").hide();
                }
            })
        })
    });
</script>
@endpush
