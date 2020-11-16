<div class="kt-portlet" id="AttributesInfo" style="" >
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">سمات المنتج</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <form action="{{ route('supplier.products.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                            <span>احتر سمة</span>
                            <span class="required">*</span>
                        </label>
                        <div class="kt-input-icon">
                            <select  class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                    id="attriubtes"
                                    name="attriubtes">
                                    <option></option>
                                @foreach($attributes as $attribute)
                                <option value="{{ $attribute->term_taxonomy_id }}">  {{ str_replace('pa_','',$attribute->taxonomy) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="button" id="add_attribute" data-action-name="{{ route('supplier.products.getAttributeSelector') }}" class="btn btn-success">
                            Add
                        </button>

                    </div>
                </div>
            </div>
            <div class="row" id="attributes_container">

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
@push('scripts')
    <script>
        $("#add_attribute").on('click',function(){
           let selected_taxonomy = $("#attriubtes").val();
           console.log('selecte taxxonomy',selected_taxonomy);
           let action = $(this).attr('data-action-name');
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
                        $("#attributes_container").prepend(response);
                    }
                },
                error:function(error){
                    console.log(error);
                },
            }
           );
        })
    </script>
@endpush
