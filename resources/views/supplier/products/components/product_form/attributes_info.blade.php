@php
$product_attributes = [];
if($product){
    $product_attributes = $product->product_attributes;
}
@endphp
<div class="kt-portlet" id="AttributesInfo" style="" >
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">سمات المنتج</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <form action="{{ route('supplier.products.store') }}" method="post">
            @csrf
            <input type="hidden" name="post_id"  value="{{ $product->ID ?? 0 }}">
            <input type="hidden" name="post_author"  value="{{ \Auth::user()->wordpress_user->ID ?? 0 }}">
            <input type="hidden" name="request_type" value="attributes">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                            <span>احتر سمة</span>
                            <span class="required">*</span>
                        </label>
                        <div class="kt-input-icon d-flex justify-contenct-between">
                            <select  class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                    id="attriubtes"
                                    name="attriubtes">
                                    <option></option>
                                @foreach($attributes as $attribute)
                                <option value="{{ $attribute->term_taxonomy_id }}">  {{ str_replace('pa_','',$attribute->taxonomy) }}</option>
                                @endforeach
                            </select>
                            <button type="button" id="add_attribute" data-action-name="{{ route('supplier.products.getAttributeSelector') }}" class="btn btn-success mr-4">
                                Add
                            </button>
                        </div>


                    </div>
                </div>
            </div>
            <hr>
            <div id="loading-attribute-selector" class="mb-15 mt-15 text-center" style="display:none">
                <div class="spinner spinner-primary spinner-lg mr-15" style=""></div>
            </div>
            <div class="row" id="attributes_container">
                @foreach($product_attributes as $key => $p_attribute)
                @include('supplier.products.components.product_form.attribute_selector',['taxonomy'=>$key,'terms'=>$p_attribute[0]->terms,'selected_terms'=>$p_attribute])
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
    </div>
</div>
@push('styles')
<link href="{{ asset('/css/typeahead.css') }}" rel="stylesheet">
@endpush
@push('scripts')

    <script>
            let term_modal = `{!! view('supplier.attributes.components.term_modal',['taxonomy_type'=>null,'type'=>'attributes']) !!}`;
           function _initTagsInput(terms){

        }
        function getTaxonomyTerms(term_taxonomy_id){
            let  csrf_token = $('meta[name="csrf-token"]').attr('content');
           $.ajax("/supplier/product/getTaxonomyTerms",
           {
                type:"POST",
                async:true,
                headers: {
                    'X-CSRF-Token': csrf_token
                },
                data:{"term_taxonomy_id":term_taxonomy_id},
                success:function(response){
                    if(response){
                        _initTagsInput(response);
                   $('#loading-attribute-selector').hide();

                    }
                },
                error:function(error){
                   $('#loading-attribute-selector').hide();
                    console.log(error);
                },
            }
           );
        }
        $("#add_attribute").on('click',function(){
           let selected_taxonomy = $("#attriubtes").val();
           let action = $(this).attr('data-action-name');
           $('#loading-attribute-selector').show();
           let  csrf_token = $('meta[name="csrf-token"]').attr('content');
           $.ajax(action,
           {
                type:"POST",
                async:true,
                headers: {
                    'X-CSRF-Token': csrf_token
                },
                data:{"term_taxonomy_id":selected_taxonomy},
                success:function(response){
                    if(response){
                        $('#attributes_container').prepend(response);
                        $('#loading-attribute-selector').hide();
                        // _initTagsInput([]);
                        //getTaxonomyTerms(selected_taxonomy);
                    }
                },
                error:function(error){
                   $('#loading-attribute-selector').hide();
                    console.log(error);
                },
            }
           );
        });
        $(document).on('click','.add_new_term',function(e){
            let taxonomy_type = $(this).attr('data-taxonomy-type');
            $('body').prepend(term_modal);
            document.getElementById('taxonomy_type').value = taxonomy_type;
            $("#AddTermModal").modal('show');
        })

    </script>

@endpush
